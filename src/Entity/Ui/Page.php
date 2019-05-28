<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Ui;

use Symfony\Component\HttpFoundation\ParameterBag;

class Page
{
    /**
     * @var string
     */
    protected $outputFilename;

    /**
     * @var string
     */
    protected $theme;

    /**
     * @var string
     */
    protected $section;

    /**
     * @var string
     */
    protected $view;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ParameterBag
     */
    protected $options;

    /**
     * @var Area[]
     */
    protected $blocks;

    public function __construct()
    {
        $this->options = new ParameterBag();
    }

    /**
     * @return string
     */
    public function getOutputFilename(): string
    {
        return $this->outputFilename;
    }

    /**
     * @param string $outputFilename
     *
     * @return Page
     */
    public function setOutputFilename(string $outputFilename): Page
    {
        $this->outputFilename = $outputFilename;
        return $this;
    }

    /**
     * @return string
     */
    public function getTheme(): string
    {
        return $this->theme;
    }

    /**
     * @param string $theme
     *
     * @return Page
     */
    public function setTheme(string $theme): Page
    {
        $this->theme = $theme;
        return $this;
    }

    /**
     * @return string
     */
    public function getSection(): string
    {
        return $this->section;
    }

    /**
     * @param string $section
     *
     * @return Page
     */
    public function setSection(string $section): Page
    {
        $this->section = $section;
        return $this;
    }

    /**
     * @return string
     */
    public function getView(): string
    {
        return $this->view;
    }

    /**
     * @param string $view
     *
     * @return Page
     */
    public function setView(string $view): Page
    {
        $this->view = $view;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Page
     */
    public function setName(string $name): Page
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options->all();
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function getOption(string $key)
    {
        return $this->options->get($key);
    }

    /**
     * @param string $key
     *
     * @return Page
     */
    public function removeOption(string $key): Page
    {
        return $this->options->remove($key);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function hasOption(string $key): bool
    {
        return $this->options->has($key);
    }

    /**
     * @param array $options
     *
     * @return Page
     */
    public function setOptions(array $options): Page
    {
        $this->options = new ParameterBag($options);
        return $this;
    }

    /**
     * @param string $key
     * @param        $value
     *
     * @return Page
     */
    public function addOption(string $key, $value): Page
    {
        $this->options->set($key, $value);
        return $this;
    }

    /**
     * @return Area[]
     */
    public function getBlocks(): array
    {
        return $this->blocks;
    }

    /**
     * @param Area[] $blocks
     *
     * @return Page
     */
    public function setBlocks(array $blocks): Page
    {
        $this->blocks = $blocks;
        return $this;
    }

}
