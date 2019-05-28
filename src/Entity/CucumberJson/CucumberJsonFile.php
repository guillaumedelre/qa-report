<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\CucumberJson;

use Agilicode\QAT\Interfaces\ArtifactInterface;

class CucumberJsonFile implements ArtifactInterface
{
    /**
     * @var bool
     */
    protected $isValid = false;

    /**
     * @var string
     */
    protected $project = '';

    /**
     * @var string
     */
    protected $vendor = '';

    /**
     * @var string
     */
    protected $file = '';

    /**
     * @var CucumberJsonAnalyse
     */
    protected $report;

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * @param bool $isValid
     *
     * @return CucumberJsonFile
     */
    public function setIsValid(bool $isValid): CucumberJsonFile
    {
        $this->isValid = $isValid;
        return $this;
    }

    /**
     * @return string
     */
    public function getProject(): string
    {
        return $this->project;
    }

    /**
     * @param string $project
     *
     * @return CucumberJsonFile
     */
    public function setProject(string $project): CucumberJsonFile
    {
        $this->project = $project;
        return $this;
    }

    /**
     * @return string
     */
    public function getVendor(): string
    {
        return $this->vendor;
    }

    /**
     * @param string $vendor
     *
     * @return CucumberJsonFile
     */
    public function setVendor(string $vendor): CucumberJsonFile
    {
        $this->vendor = $vendor;
        return $this;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $file
     *
     * @return CucumberJsonFile
     */
    public function setFile(string $file): CucumberJsonFile
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return CucumberJsonAnalyse
     */
    public function getReport(): CucumberJsonAnalyse
    {
        return $this->report;
    }

    /**
     * @param CucumberJsonAnalyse $report
     *
     * @return CucumberJsonFile
     */
    public function setReport(CucumberJsonAnalyse $report): CucumberJsonFile
    {
        $this->report = $report;
        return $this;
    }
}
