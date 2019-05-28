<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class Complexity
{
    /**
     * @var float
     */
    protected $averageCyclomaticComplexityByClass = .0;

    /**
     * @var float
     */
    protected $averageWeightedmethodCountByClass = .0;

    /**
     * @var float
     */
    protected $averageRelativeSystemComplexity = .0;

    /**
     * @var float
     */
    protected $averageDifficulty = .0;

    /**
     * @return float
     */
    public function getAverageCyclomaticComplexityByClass(): float
    {
        return $this->averageCyclomaticComplexityByClass;
    }

    /**
     * @param float $averageCyclomaticComplexityByClass
     *
     * @return Complexity
     */
    public function setAverageCyclomaticComplexityByClass(float $averageCyclomaticComplexityByClass): Complexity
    {
        $this->averageCyclomaticComplexityByClass = $averageCyclomaticComplexityByClass;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageWeightedmethodCountByClass(): float
    {
        return $this->averageWeightedmethodCountByClass;
    }

    /**
     * @param float $averageWeightedmethodCountByClass
     *
     * @return Complexity
     */
    public function setAverageWeightedmethodCountByClass(float $averageWeightedmethodCountByClass): Complexity
    {
        $this->averageWeightedmethodCountByClass = $averageWeightedmethodCountByClass;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageRelativeSystemComplexity(): float
    {
        return $this->averageRelativeSystemComplexity;
    }

    /**
     * @param float $averageRelativeSystemComplexity
     *
     * @return Complexity
     */
    public function setAverageRelativeSystemComplexity(float $averageRelativeSystemComplexity): Complexity
    {
        $this->averageRelativeSystemComplexity = $averageRelativeSystemComplexity;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageDifficulty(): float
    {
        return $this->averageDifficulty;
    }

    /**
     * @param float $averageDifficulty
     *
     * @return Complexity
     */
    public function setAverageDifficulty(float $averageDifficulty): Complexity
    {
        $this->averageDifficulty = $averageDifficulty;
        return $this;
    }
}
