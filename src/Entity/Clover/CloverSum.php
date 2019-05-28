<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Clover;

class CloverSum
{
    /**
     * @var int
     */
    protected $count = 0;

    /**
     * @var float
     */
    protected $coverage = .0;

    /**
     * @var array
     */
    protected $fileReports = [];

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return CloverSum
     */
    public function setCount(int $count): CloverSum
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return float
     */
    public function getCoverage(): float
    {
        return $this->coverage;
    }

    /**
     * @param float $totalCoverage
     *
     * @return CloverSum
     */
    public function addCoverage(float $totalCoverage): CloverSum
    {
        $this->coverage += $totalCoverage;
        return $this;
    }

    /**
     * @return array
     */
    public function getFileReports(): array
    {
        return $this->fileReports;
    }

    /**
     * @param array $fileReports
     *
     * @return CloverSum
     */
    public function addFileReports(array $fileReports): CloverSum
    {
        $this->fileReports = array_merge($this->fileReports, $fileReports);
        return $this;
    }
}
