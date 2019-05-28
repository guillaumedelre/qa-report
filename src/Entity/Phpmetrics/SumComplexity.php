<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class SumComplexity
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
     * @return SumComplexity
     */
    public function addAverageCyclomaticComplexityByClass(float $averageCyclomaticComplexityByClass): SumComplexity
    {
        $this->averageCyclomaticComplexityByClass += $averageCyclomaticComplexityByClass;
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
     * @return SumComplexity
     */
    public function addAverageWeightedmethodCountByClass(float $averageWeightedmethodCountByClass): SumComplexity
    {
        $this->averageWeightedmethodCountByClass += $averageWeightedmethodCountByClass;
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
     * @return SumComplexity
     */
    public function addAverageRelativeSystemComplexity(float $averageRelativeSystemComplexity): SumComplexity
    {
        $this->averageRelativeSystemComplexity += $averageRelativeSystemComplexity;
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
     * @return SumComplexity
     */
    public function addAverageDifficulty(float $averageDifficulty): SumComplexity
    {
        $this->averageDifficulty += $averageDifficulty;
        return $this;
    }
}
