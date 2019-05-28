<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Crap4j;

use Agilicode\QAT\Interfaces\ArtifactInterface;

class Crap4jFile implements ArtifactInterface
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
     * @var Crap4jReport
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
     * @return Crap4jFile
     */
    public function setProject(string $project): Crap4jFile
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
     * @return Crap4jFile
     */
    public function setVendor(string $vendor): Crap4jFile
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
     * @return Crap4jFile
     */
    public function setFile(string $file): Crap4jFile
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return Crap4jReport
     */
    public function getReport(): Crap4jReport
    {
        return $this->report;
    }

    /**
     * @param Crap4jReport $report
     *
     * @return Crap4jFile
     */
    public function setReport(Crap4jReport $report): Crap4jFile
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
     * @return Crap4jFile
     */
    public function setIsValid(bool $isValid): Crap4jFile
    {
        $this->isValid = $isValid;
        return $this;
    }

}
