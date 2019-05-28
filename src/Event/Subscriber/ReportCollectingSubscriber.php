<?php
declare(strict_types=1);

namespace Agilicode\QAT\Event\Subscriber;

use Agilicode\QAT\Core\Project;
use Agilicode\QAT\Entity\StateMachine\ReportStateMachine;
use Agilicode\QAT\Exception\CollectException;
use Agilicode\QAT\Exception\NoCollectorFoundException;
use Agilicode\QAT\Interfaces\CollectorInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Workflow\Event\Event;

final class ReportCollectingSubscriber implements EventSubscriberInterface
{
    /**
     * @var CollectorInterface
     */
    protected $collector;

    /**
     * @param CollectorInterface $collector
     */
    public function __construct(CollectorInterface $collector)
    {
        $this->collector = $collector;
    }

    /**
     * @param Event $event
     */
    public function process(Event $event)
    {
        /** @var ReportStateMachine $object */
        $object = $event->getSubject();

        $io = $object->getIo();

        /** @var Project $project */
        foreach ($object->getProjects() as $project) {

            $io->section('Collecting ' . ucfirst($project->getName()));

            foreach ($project->retrieveArtifacts() as $vendor => $files) {

                $io->writeln("<fg=cyan>> Collecting $vendor build artifacts…</>");

                /** @var SplFileInfo $file */
                foreach ($files as $file) {
                    try {
                        $artifact = $this->collector->collect(
                            $file,
                            [
                                'project_name' => $project->getName(),
                                'vendor'       => $vendor,
                            ]
                        );
                        $object->addVendor($vendor);
                        $object->addArtifact($artifact);
                        $io->writeln("<fg=green>+</> " . $file->getRealPath());
                    } catch (NoCollectorFoundException $e) {
                        // todo: log something
                        $io->writeln("<fg=yellow>!</> " . $file->getRealPath());
                        $io->writeln("<fg=yellow>  {$e->getMessage()}</>");
                    } catch (CollectException $e) {
                        // todo: log something
                        $io->writeln("<fg=red>-</> " . $file->getRealPath());
                        $io->writeln("<fg=red>  {$e->getMessage()}</>");
                    }
                }
            }
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            'workflow.qa_report.transition.collecting' => 'process',
        ];
    }
}
