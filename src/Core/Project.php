<?php
declare(strict_types=1);

namespace Agilicode\QAT\Core;

use Agilicode\QAT\Factory\FinderFactory;
use Agilicode\QAT\Interfaces\ProjectInterface;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Project implements ProjectInterface
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @param array        $options
     */
    public function __construct(array $options)
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->options['project_name'];
    }

    /**
     * @return array
     */
    public function retrieveArtifacts(): array
    {
        $files = [];
        foreach ($this->options['vendors'] as $vendor) {
            $vendor['lookup']['in'] .= DIRECTORY_SEPARATOR . $this->options['project_name'];
            $finder = FinderFactory::createFromContext($vendor['lookup']);
            /** @var SplFileInfo $file */
            foreach ($finder->files() as $file) {
                $files[$vendor['name']][] = $file;
            }
        }

        return $files;
    }

    /**
     * @param OptionsResolver $resolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setRequired(['project_name', 'path', 'vendors'])
        ;
    }
}
