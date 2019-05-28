<?php
declare(strict_types=1);

namespace Agilicode\QAT\DependencyInjection\Compiler;

use Agilicode\QAT\Core\Project;
use Agilicode\QAT\Core\ProjectContainer;
use Agilicode\QAT\Factory\FinderFactory;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Yaml\Yaml;

class AutoconfigurePass implements CompilerPassInterface
{
    /**
     * @var array
     */
    protected $options;

    public function process(ContainerBuilder $container)
    {
        $projectDir = $container->getParameter('kernel.project_dir');

        /** @var Filesystem $filesystem */
        $filesystem = $container->get(Filesystem::class);
        if (!$filesystem->exists("$projectDir/.qat.yaml")) {
            throw new \RuntimeException('Configuration file not found');
        }

        // Resolve configuration
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);
        $this->options = $resolver->resolve(Yaml::parse(\file_get_contents("$projectDir/.qat.yaml")));

        $projectReferences= [];
        foreach ($this->getProjects() as $project) {
            $name = $project['project_name'];
            $definition = new Definition(Project::class);
            $definition->setArgument(0, $project);
            $definition->addTag('qat.project');
            $container->setDefinition("qat.project.$name", $definition);
            $projectReferences[] = new Reference("qat.project.$name");
        }

        $definition = new Definition(ProjectContainer::class);
        $definition->setArgument(0, $projectReferences);
        $definition->setPublic(true);
        $container->setDefinition('qat.container.projects', $definition);

        $container->setParameter('qat.report.config', $this->options['report']);
    }

    /**
     * Discovers applications searching composer.lock files
     * (You can change the value of autoconfigure/lookup/name to composer.json in the config file)
     *
     * Retrieves data to build Artifacts
     *
     * @return array
     */
    public function getProjects(): array
    {
        $return = [];

        $finder = FinderFactory::createFromContext($this->options['autoconfigure']['lookup']);

        /** @var SplFileInfo $file */
        foreach ($finder->files() as $file) {
            $artifact = [
                'project_name' => $file->getRelativePath(),
                'path'        => $file->getPath(),
                'vendors' => [],
            ];

            $jsonEncoder = new JsonEncoder();
            $composer = $jsonEncoder->decode($file->getContents(), JsonEncoder::FORMAT);
            foreach ($this->options['autoconfigure']['vendors'] as $vendor) {
                $packageName = $vendor['package'];
                unset($vendor['package']);
                if (!$this->isPackageRequired($packageName, $composer)) {
                    continue;
                }

                $artifact['vendors'][] = $vendor;
            }

            $return[] = $artifact;
        }

        return $return;
    }

    /**
     * @param OptionsResolver $resolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(
                [
                    'default'       => [
                        'lookup' => [
                            'in'           => [],
                            'name'         => [],
                            'not_name'     => [],
                            'path'         => [],
                            'not_path'     => [],
                            'contains'     => [],
                            'not_contains' => [],
                            'exclude'      => ['vendor'],
                            'depth'        => ['>= 0', '< 10'],
                        ],
                    ],
                    'autoconfigure' => [
                        'lookup'  => [],
                        'vendors' => [],
                    ],
                    'report'        => [
                        'title'  => '',
                        'output' => '',
                    ],
                ]
            )
            ->setRequired(['autoconfigure'])
        ;
    }

    /**
     * @param string $packageName
     * @param        $composer
     *
     * @return bool
     */
    private function isPackageRequired(string $packageName, $composer): bool
    {
        foreach ($composer['packages-dev'] as $devPackage) {
            if ($packageName !== $devPackage['name']) {
                continue;
            }
            return true;
        }

        return false;
    }

}
