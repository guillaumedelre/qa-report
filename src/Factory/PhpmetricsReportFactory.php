<?php
declare(strict_types=1);

namespace Agilicode\QAT\Factory;

use Agilicode\QAT\Entity\Phpmetrics\Bug;
use Agilicode\QAT\Entity\Phpmetrics\Complexity;
use Agilicode\QAT\Entity\Phpmetrics\Coupling;
use Agilicode\QAT\Entity\Phpmetrics\Loc;
use Agilicode\QAT\Entity\Phpmetrics\Oop;
use Agilicode\QAT\Entity\Phpmetrics\Package;
use Agilicode\QAT\Entity\Phpmetrics\Report;
use Agilicode\QAT\Entity\Phpmetrics\Violation;

class PhpmetricsReportFactory
{
    /**
     * @param array $metrics
     *
     * @return Report
     */
    public static function create(array $metrics): Report
    {
        $report = new Report();

        foreach ($metrics as $metric) {
            if ($metric instanceof Loc) {
                $report->setLoc($metric);
            }
            if ($metric instanceof Oop) {
                $report->setOop($metric);
            }
            if ($metric instanceof Coupling) {
                $report->setCoupling($metric);
            }
            if ($metric instanceof Complexity) {
                $report->setComplexity($metric);
            }
            if ($metric instanceof Package) {
                $report->setPackage($metric);
            }
            if ($metric instanceof Bug) {
                $report->setBug($metric);
            }
            if ($metric instanceof Violation) {
                $report->setViolation($metric);
            }
        }

        return $report;
    }
}
