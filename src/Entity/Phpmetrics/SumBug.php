<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class SumBug
{
    /**
     * @var float
     */
    protected $averageBugsByClass = .0;

    /**
     * @var float
     */
    protected $averageDefectsByClass = .0;

    /**
     * @return float
     */
    public function getAverageBugsByClass(): float
    {
        return $this->averageBugsByClass;
    }

    /**
     * @param float $averageBugsByClass
     *
     * @return SumBug
     */
    public function addAverageBugsByClass(float $averageBugsByClass): SumBug
    {
        $this->averageBugsByClass += $averageBugsByClass;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageDefectsByClass(): float
    {
        return $this->averageDefectsByClass;
    }

    /**
     * @param float $averageDefectsByClass
     *
     * @return SumBug
     */
    public function addAverageDefectsByClass(float $averageDefectsByClass): SumBug
    {
        $this->averageDefectsByClass += $averageDefectsByClass;
        return $this;
    }
}
