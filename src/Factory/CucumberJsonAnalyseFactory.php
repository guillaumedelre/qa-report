<?php
declare(strict_types=1);

namespace Agilicode\QAT\Factory;

use Agilicode\QAT\Entity\CucumberJson\CucumberJsonAnalyse;
use Agilicode\QAT\Entity\CucumberJson\CucumberJsonFile;
use Agilicode\QAT\Interfaces\ArtifactInterface;

class CucumberJsonAnalyseFactory
{
    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return CucumberJsonAnalyse
     */
    public static function create(array $artifacts): CucumberJsonAnalyse
    {
        $count = 0;
        $metric = new CucumberJsonAnalyse();
        /** @var CucumberJsonFile $artifact */
        foreach ($artifacts as $artifact) {
            if (!$artifact instanceof CucumberJsonFile || empty($artifact->getReport())) {
                continue;
            }
            /** @var CucumberJsonAnalyse $report */
            $report = $artifact->getReport();
            foreach ($report->getFeatures() as $feature) {
                $metric->addFeature($feature);
            }
            $count++;
        }
        $metric->setCount($count);

        return $metric;
    }
}
