<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Crap4j;

class Crap4jReport
{
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
     * @var array
     */
    protected $methods = [];

    /**
     * @return int
     */
    public function getMethodCount(): int
    {
        return $this->methodCount;
    }

    /**
     * @param int $methodCount
     *
     * @return Crap4jReport
     */
    public function setMethodCount(int $methodCount): Crap4jReport
    {
        $this->methodCount = $methodCount;
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
     * @return Crap4jReport
     */
    public function setCrapMethodCount(int $crapMethodCount): Crap4jReport
    {
        $this->crapMethodCount = $crapMethodCount;
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
     * @return Crap4jReport
     */
    public function setCrapLoad(int $crapLoad): Crap4jReport
    {
        $this->crapLoad = $crapLoad;
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
     * @return Crap4jReport
     */
    public function setTotalCrap(float $totalCrap): Crap4jReport
    {
        $this->totalCrap = $totalCrap;
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
     * @return Crap4jReport
     */
    public function setCrapMethodPercent(float $crapMethodPercent): Crap4jReport
    {
        $this->crapMethodPercent = $crapMethodPercent;
        return $this;
    }

    /**
     * @return array
     */
    public function getMethods(): array
    {
        return $this->methods;
    }

    /**
     * @param array $methods
     *
     * @return Crap4jReport
     */
    public function setMethods(array $methods): Crap4jReport
    {
        $this->methods = $methods;
        return $this;
    }

}
