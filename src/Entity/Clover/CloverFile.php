<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Clover;

use Agilicode\QAT\Interfaces\ArtifactInterface;
use Codacy\Coverage\Report\CoverageReport;

class CloverFile implements ArtifactInterface
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
     * @var CoverageReport|null
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
     * @return CloverFile
     */
    public function setProject(string $project): CloverFile
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
     * @return CloverFile
     */
    public function setVendor(string $vendor): CloverFile
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
     * @return CloverFile
     */
    public function setFile(string $file): CloverFile
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return CoverageReport|null
     */
    public function getReport(): ?CoverageReport
    {
        return $this->report;
    }

    /**
     * @param CoverageReport|null $report
     *
     * @return CloverFile
     */
    public function setReport(?CoverageReport $report): CloverFile
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
     * @return CloverFile
     */
    public function setIsValid(bool $isValid): CloverFile
    {
        $this->isValid = $isValid;
        return $this;
    }

}
