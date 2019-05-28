<?php
declare(strict_types=1);

namespace Agilicode\QAT\Event\Subscriber;

use Agilicode\QAT\Core\Project;
use Agilicode\QAT\Entity\StateMachine\ReportStateMachine;
use Agilicode\QAT\Entity\Ui\Page;
use Agilicode\QAT\Interfaces\RendererInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Workflow\Event\Event;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final class ReportRenderingSubscriber implements EventSubscriberInterface
{
    /**
     * @var RendererInterface
     */
    protected $renderer;


    /**
     * @var Environment
     */
    protected $twig;

    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * @var array
     */
    protected $options;

    /**
     * ReportRenderingSubscriber constructor.
     *
     * @param RendererInterface $renderer
     * @param Environment       $twig
     * @param Filesystem        $filesystem
     * @param array             $options
     */
    public function __construct(RendererInterface $renderer, Environment $twig, Filesystem $filesystem, array $options)
    {
        $this->renderer = $renderer;
        $this->twig = $twig;
        $this->filesystem = $filesystem;
        $this->options = $options;
    }

    /**
     * @param Event $event
     */
    public function process(Event $event)
    {
        /** @var ReportStateMachine $object */
        $object = $event->getSubject();

        $io = $object->getIo();

        $io->section('Rendering report ' . ucfirst($this->options['title']));

        $io->writeln("<fg=cyan>> Generating html…</>");

        $this->ensurePathExists($io, $this->options['assets']['source']);
        $this->filesystem->mirror(
            $this->options['assets']['source'],
            $this->options['assets']['destination']
        );

        $this->options['brand_link']['href'] = realpath($this->options['brand_link']['href']);
        $brandLink = $this->options['brand_link'];

        $baseLinkUrl = realpath($this->options['output']);

        $projectNames = array_map(
            function (Project $project) {
                return $project->getName();
            }, $object->getProjects()
        );

        /**
         * The array of pages to generate
         * @todo should be in .qat.yaml ?
         */
        $pages = [];
        $headerLinks = [];
        $navigationLinks = [];
        foreach ($projectNames as $projectName) {
            $headerLinks[] = [
                'label' => $projectName,
                'href'  => "$baseLinkUrl/$projectName/{$object->getVendors()[0]}.html",
            ];
            $navigationLinks[$projectName] = [];
            foreach (array_unique($object->getVendors()) as $vendor) {
                $navigationLinks[$projectName][] = [
                    'label' => $vendor,
                    'href'  => "$baseLinkUrl/$projectName/$vendor.html",
                ];

            }
        }

        foreach ($object->getProjects() as $project) {
            foreach (array_unique($object->getVendors()) as $vendor) {
                $artifacts = [];
                foreach ($object->getArtifacts() as $artifact) {
                    if ($artifact->getProject() !== $project->getName() || $artifact->getVendor() !== $vendor) {
                        continue;
                    }
                    $artifacts[] = $artifact;
                }
                $page = new Page();
                $page->setName('Dashboard');
                $page->setTheme('default');
                $page->setSection($project->getName());
                $page->setView("default/dashboard/$vendor.html.twig");
                $page->addOption('page_name', $page->getName());
                $page->addOption('page_theme', $page->getTheme());
                $page->addOption('page_section', $page->getSection());
                $page->addOption('page_title', $this->options['title']);
                $page->addOption('brand_link', $brandLink);
                $page->addOption('header_links', $headerLinks);
                $page->addOption('navigation_links', $navigationLinks[$project->getName()]);
                $page->addOption('current_header_link', $project->getName());
                $page->addOption('current_navigation_link', $vendor);
                $page->addOption('current_vendor', $vendor);
                $page->addOption('artifacts', $artifacts);
                $page->addOption('vendors', array_unique($object->getVendors()));
                $page->addOption('assets_path', realpath(($this->options['assets']['destination'])));
                $page->setOutputFilename($baseLinkUrl . DIRECTORY_SEPARATOR . "{$project->getName()}/$vendor.html"
                );
                $pages[] = $page;
            }
        }

        $files = [];
        /** @var Page $page */
        foreach ($pages as $page) {
            try {
                $html = $this->twig->render(
                    $page->getView(),
                    $page->getOptions()
                );
                $files[] = [
                    'html'     => $html,
                    'filename' => $page->getOutputFilename(),
                ];
                $io->writeln("<fg=green>+</> {$page->getView()}");
            } catch (LoaderError $e) {
                // todo: log something
                $io->writeln("<fg=red>-</> {$page->getView()}");
                $io->writeln("<fg=red>  {$e->getMessage()}</>");
                $io->writeln("<fg=red>  {$e->getFile()}:{$e->getLine()}</>");
            } catch (SyntaxError $e) {
                // todo: log something
                $io->writeln("<fg=red>-</> {$page->getView()}");
                $io->writeln("<fg=red>  {$e->getMessage()}</>");
                $io->writeln("<fg=red>  {$e->getFile()}:{$e->getLine()}</>");
            } catch (RuntimeError $e) {
                // todo: log something
                $io->writeln("<fg=red>-</> {$page->getView()}");
                $io->writeln("<fg=red>  {$e->getMessage()}</>");
                $io->writeln("<fg=red>  {$e->getFile()}:{$e->getLine()}</>");
            }
        }

        $io->writeln("<fg=cyan>> Writing html files…</>");

        foreach ($files as $file) {
            try {
                $this->ensurePathExists($io, dirname($file['filename']));
                $this->filesystem->dumpFile($file['filename'], $file['html']);
                $io->writeln("<fg=green>+</> $file[filename]");
            } catch (IOException $e) {
                // todo: log something
                $io->writeln("<fg=red>-</> $file[filename]");
                $io->writeln("<fg=red>  {$e->getMessage()}</>");
            }
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            'workflow.qa_report.transition.rendering' => 'process',
        ];
    }

    /**
     * @param SymfonyStyle $io
     * @param string       $path
     */
    private function ensurePathExists(SymfonyStyle $io, string $path)
    {
        if (!$this->filesystem->exists($path)) {
            try {
                $this->filesystem->mkdir($path);
                $io->writeln("<fg=green>+</> $path");
            } catch (IOException $e) {
                // todo: log something
                $io->writeln("<fg=green>-</> $path");
                $io->writeln("<fg=red>  {$e->getMessage()}</>");
            }
        }
    }
}
