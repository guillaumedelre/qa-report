<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\CucumberJson;

use Khill\Duration\Duration;

class CucumberJsonAnalyse
{
    /**
     * @var int
     */
    protected  $count = 0;

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
     * @return float|null
     */
    public function getTotalTime(): ?float
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
     * @return string
     */
    public function getAverageTimeByScenario(): string
    {
        if ($this->getTotalScenario() === 0) {
            return '-';
        }

        $return = round($this->getTotalTime() / $this->getTotalScenario());

        return "$return";
    }

    /**
     * @return string
     */
    public function getAverageTimeByFeature(): string
    {
        if (\count($this->features) === 0) {
            return '-';
        }

        $return = round($this->getTotalTime() / \count($this->features));

        return "$return";
    }

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
     * @return CucumberJsonAnalyse
     */
    public function setCount(int $count): CucumberJsonAnalyse
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return array
     */
    public function getStepsRatioForFeatures(): array
    {
        $statuses = [];
        foreach ($this->features as $feature) {
            foreach ($feature->getStepsGroupByStatus() as $status => $value) {
                if (!isset($statuses[$status])) {
                    $statuses[$status] = 0;
                }
                $statuses[$status] += $value;
            }
        }

        return $statuses;
    }

    /**
     * @return array
     */
    public function getBenchForFeatures(): array
    {
        $bench = [];
        foreach ($this->features as $feature) {
            $bench[] = [
                'feature' => $feature->getName(),
                'elapsedTime' => $feature->getTotalTime(),
            ];
        }

        return $bench;
    }

    /**
     * @return array
     */
    public function getBenchForScenarios(): array
    {
        $bench = [];
        foreach ($this->features as $feature) {
            foreach ($feature->getElements() as $scenario) {
                $bench[] = [
                    'scenario' => $scenario->getName(),
                    'elapsedTime' => $scenario->getTotalTime(),
                ];
            }
        }

        return $bench;
    }

    /**
     * @return array
     */
    public function getStepStatusRatioForScenarios(): array
    {
        return [
            'success' => 0,
            'fail' => 0,
        ];
    }

    /**
     * @return array
     */
    public function getStatusRatioForStep(): array
    {
        return [
            'success' => 0,
            'fail' => 0,
        ];
    }
}
