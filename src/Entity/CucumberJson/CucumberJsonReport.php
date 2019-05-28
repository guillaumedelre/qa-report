<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\CucumberJson;

class CucumberJsonReport
{
    /**
     * @var BehatFeature[]
     */
    protected  $features = [];

    /**
     * @return BehatFeature[]
     */
    public function getFeatures(): array
    {
        return $this->features;
    }

    /**
     * @param BehatFeature $feature
     *
     * @return CucumberJsonAnalyse
     */
    public function addFeature(BehatFeature $feature): CucumberJsonAnalyse
    {
        $this->features[] = $feature;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getTotalTime(): ?int
    {
        $total = 0;
        foreach ($this->features as $feature) {
            $total += $feature->getTotalTime();
        }

        return $total;
    }

    /**
     * @return int
     */
    public function getTotalStep(): int
    {
        $total = 0;
        foreach ($this->features as $feature) {
            $total += $feature->getTotalStep();
        }

        return $total;
    }

    /**
     * @return int
     */
    public function getTotalScenario(): int
    {
        $total = 0;
        foreach ($this->features as $feature) {
            $total += $feature->getTotalScenario();
        }

        return $total;
    }

    /**
     * @return float
     */
    public function getAverageStepByScenario(): float
    {
        return round($this->getTotalStep() / $this->getTotalScenario(), 2);
    }

    /**
     * @return float
     */
    public function getAverageStepByFeature(): float
    {
        return round($this->getTotalStep() / \count($this->features), 2);
    }

    /**
     * @return float
     */
    public function getAverageTimeByScenario(): float
    {
        return round($this->getTotalTime() / $this->getTotalScenario());
    }

    /**
     * @return float
     */
    public function getAverageTimeByFeature(): float
    {
        return round($this->getTotalTime() / \count($this->features));
    }
}
