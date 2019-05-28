<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Crap4j;

class Crap4jSum
{
    /**
     * @var int
     */
    protected $count = 0;

    /**
     * @var int
     */
    protected $methodCount = 0;

    /**
     * @var int
     */
    protected $crapMethodCount = 0;

    /**
     * @var int
     */
    protected $crapLoad = 0;

    /**
     * @var float
     */
    protected $totalCrap = .0;

    /**
     * @var float
     */
    protected $crapMethodPercent = .0;

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
     * @return Crap4JSum
     */
    public function setCount(int $count): Crap4JSum
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return int
     */
    public function getCrapMethodCount(): int
    {
        return $this->crapMethodCount;
    }

    /**
     * @param int $crapMethodCount
     *
     * @return Crap4JSum
     */
    public function addCrapMethodCount(int $crapMethodCount): Crap4JSum
    {
        $this->crapMethodCount += $crapMethodCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getCrapLoad(): int
    {
        return $this->crapLoad;
    }

    /**
     * @param int $crapLoad
     *
     * @return Crap4JSum
     */
    public function addCrapLoad(int $crapLoad): Crap4JSum
    {
        $this->crapLoad += $crapLoad;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalCrap(): float
    {
        return $this->totalCrap;
    }

    /**
     * @param float $totalCrap
     *
     * @return Crap4JSum
     */
    public function addTotalCrap(float $totalCrap): Crap4JSum
    {
        $this->totalCrap += $totalCrap;
        return $this;
    }

    /**
     * @return float
     */
    public function getCrapMethodPercent(): float
    {
        return $this->crapMethodPercent;
    }

    /**
     * @param float $crapMethodPercent
     *
     * @return Crap4JSum
     */
    public function addCrapMethodPercent(float $crapMethodPercent): Crap4JSum
    {
        $this->crapMethodPercent += $crapMethodPercent;
        return $this;
    }
}
