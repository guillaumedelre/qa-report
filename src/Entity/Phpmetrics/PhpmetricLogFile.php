<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

use Agilicode\QAT\Interfaces\ArtifactInterface;

class PhpmetricLogFile implements ArtifactInterface
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
     * @var Report
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
     * @return PhpmetricLogFile
     */
    public function setProject(string $project): PhpmetricLogFile
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
     * @return PhpmetricLogFile
     */
    public function setVendor(string $vendor): PhpmetricLogFile
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
     * @return PhpmetricLogFile
     */
    public function setFile(string $file): PhpmetricLogFile
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return Report
     */
    public function getReport(): Report
    {
        return $this->report;
    }

    /**
     * @param Report $report
     *
     * @return PhpmetricLogFile
     */
    public function setReport(Report $report): PhpmetricLogFile
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
     * @return PhpmetricLogFile
     */
    public function setIsValid(bool $isValid): PhpmetricLogFile
    {
        $this->isValid = $isValid;
        return $this;
    }
}
