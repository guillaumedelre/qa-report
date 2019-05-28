<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class Bug
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
     * @return Bug
     */
    public function setAverageBugsByClass(float $averageBugsByClass): Bug
    {
        $this->averageBugsByClass = $averageBugsByClass;
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
     * @return Bug
     */
    public function setAverageDefectsByClass(float $averageDefectsByClass): Bug
    {
        $this->averageDefectsByClass = $averageDefectsByClass;
        return $this;
    }
}
