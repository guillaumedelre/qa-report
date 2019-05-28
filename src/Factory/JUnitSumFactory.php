<?php
declare(strict_types=1);

namespace Agilicode\QAT\Factory;

use Agilicode\QAT\Entity\JUnit\JUnitFile;
use Agilicode\QAT\Entity\JUnit\JUnitSum;
use Agilicode\QAT\Interfaces\ArtifactInterface;
use RazeSoldier\JUnitLogParser\TestResult;

class JUnitSumFactory
{
    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return JUnitSum
     */
    public static function create(array $artifacts): JUnitSum
    {
        $metric = new JUnitSum();

        /** @var JUnitFile $artifact */
        foreach ($artifacts as $artifact) {
            if (!$artifact instanceof JUnitFile || empty($artifact->getReport())) {
                continue;
            }

            /** @var TestResult $report */
            $report = $artifact->getReport();

            $metric->addTests($report->getTests());
            $metric->addErrors($report->getErrors());
            $metric->addFailures($report->getFailures());
            $metric->addAssertions($report->getAssertions());
            $metric->addSkipped($report->getSkipped());
            $metric->addTime($report->getTime());
        }

        return $metric;
    }
}
