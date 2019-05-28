<?php
declare(strict_types=1);

namespace Agilicode\QAT\Factory;

use Agilicode\QAT\Entity\Clover\CloverFile;
use Agilicode\QAT\Entity\Clover\CloverSum;
use Agilicode\QAT\Interfaces\ArtifactInterface;
use Codacy\Coverage\Report\CoverageReport;

class CloverSumFactory
{
    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return CloverSum
     */
    public static function create(array $artifacts): CloverSum
    {
        $count = 0;
        $metric = new CloverSum();
        /** @var CloverFile $artifact */
        foreach ($artifacts as $artifact) {
            if (!$artifact instanceof CloverFile) {
                continue;
            }

            /** @var CoverageReport $report */
            $report = $artifact->getReport();
            $metric->addCoverage($report->getTotal());
            $metric->addFileReports($report->getFileReports());
            $count++;
        }
        $metric->setCount($count);

        return $metric;
    }
}
