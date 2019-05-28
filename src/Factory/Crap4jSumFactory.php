<?php
declare(strict_types=1);

namespace Agilicode\QAT\Factory;

use Agilicode\QAT\Entity\Crap4j\Crap4jFile;
use Agilicode\QAT\Entity\Crap4j\Crap4jReport;
use Agilicode\QAT\Entity\Crap4j\Crap4jSum;
use Agilicode\QAT\Interfaces\ArtifactInterface;

class Crap4jSumFactory
{
    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return Crap4jSum
     */
    public static function create(array $artifacts): Crap4jSum
    {
        $count = 0;
        $metric = new Crap4jSum();
        /** @var Crap4jFile $artifact */
        foreach ($artifacts as $artifact) {
            if (!$artifact instanceof Crap4jFile) {
                continue;
            }

            /** @var Crap4jReport $report */
            $report = $artifact->getReport();
            $metric->addCrapLoad($report->getCrapLoad());
            $metric->addCrapMethodCount($report->getCrapMethodCount());
            $metric->addCrapMethodPercent($report->getCrapMethodPercent());
            $metric->addTotalCrap($report->getTotalCrap());
            $count++;
        }
        $metric->setCount($count);

        return $metric;
    }
}
