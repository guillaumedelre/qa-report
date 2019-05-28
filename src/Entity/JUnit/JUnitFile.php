<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\JUnit;

use Agilicode\QAT\Interfaces\ArtifactInterface;
use RazeSoldier\JUnitLogParser\TestResult;

class JUnitFile implements ArtifactInterface
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
     * @var
     */
    protected $report;

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
     * @return JUnitFile
     */
    public function setProject(string $project): JUnitFile
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
     * @return JUnitFile
     */
    public function setVendor(string $vendor): JUnitFile
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
     * @return JUnitFile
     */
    public function setFile(string $file): JUnitFile
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return TestResult
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * @param TestResult $report
     *
     * @return JUnitFile
     */
    public function setReport($report)
    {
        $this->report = $report;
        return $this;
    }

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
     * @return JUnitFile
     */
    public function setIsValid(bool $isValid): JUnitFile
    {
        $this->isValid = $isValid;
        return $this;
    }
}
