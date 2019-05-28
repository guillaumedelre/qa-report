<?php
declare(strict_types=1);

namespace Agilicode\QAT\Twig;

use Agilicode\QAT\Entity\Phpmetrics\PhpmetricLogFile;
use Agilicode\QAT\Entity\Phpmetrics\PhpmetricsSum;
use Agilicode\QAT\Entity\Phpmetrics\Report;
use Agilicode\QAT\Factory\PhpmetricsSumFactory;
use Agilicode\QAT\Interfaces\ArtifactInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PhpmetricsExtension extends AbstractExtension
{
    private const VIOLATION_TEMPLATE = <<<EOS

    var color = Chart.helpers.color;
    var doughnutChartData = {
        labels: [%s],
        datasets: [%s]
    
    };

    window.onload = function() {
        var ctx = document.getElementById('%s').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: doughnutChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                tooltips: {
                    enabled: true,
                    mode: 'index',
                    position: 'nearest'
                }
            }
        });

    };
EOS;

    private const AVG_TEMPLATE = <<<EOS
    var utils = {
        transparentize: function(color, opacity) {
            var alpha = opacity === undefined ? 0.5 : 1 - opacity;
            return Color(color).alpha(alpha).rgbString();
        }
    };
    
    function makeHalfAsOpaque(ctx) {
        var c = ctx.dataset.backgroundColor;
        return utils.transparentize(c);
    }
        
    var avgData = {
        labels: [%s],
        datasets: [
            {
                label: 'PhpMetrics averages',
                data: [%s],
                backgroundColor: Chart.helpers.color('#4dc9f6').alpha(0.2).rgbString(),
                borderColor: '#4dc9f6',
            }			
        ]
    };

    var avgOptions = {
        responsive: true,
        tooltips: true,
        legend: {
            position: 'top',
        },
        tooltips: {
            enabled: true,
            mode: 'index',
            position: 'nearest'
        },
        elements: {
            point: {
                hoverBackgroundColor: makeHalfAsOpaque,
                radius: 5,
                pointStyle: 'circle',
                hoverRadius: 15,
            }
        }
    };

    new Chart('%s', {
        type: 'radar',
        data: avgData,
        options: avgOptions
    });
EOS;

    public function getFunctions()
    {
        return [
            new TwigFunction('phpmetricsTotalLoc', [$this, 'phpmetricsTotalLoc']),
            new TwigFunction('phpmetricsSumLoc', [$this, 'phpmetricsSumLoc']),
            new TwigFunction('phpmetricsAvgBugsByClass', [$this, 'phpmetricsAvgBugsByClass']),
            new TwigFunction('phpmetricsAvgComplexityByClass', [$this, 'phpmetricsAvgComplexityByClass']),
            new TwigFunction('graphPhpmetricsViolations', [$this, 'graphPhpmetricsViolations']),
            new TwigFunction('graphPhpmetricsAverages', [$this, 'graphPhpmetricsAverages']),
            new TwigFunction('graphPhpmetricsSumViolations', [$this, 'graphPhpmetricsSumViolations']),
            new TwigFunction('graphPhpmetricsSumAverages', [$this, 'graphPhpmetricsSumAverages']),
        ];
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function phpmetricsAvgComplexityByClass(array $artifacts)
    {
        $metric = PhpmetricsSumFactory::create($artifacts);

        $count = round(
            $metric->getSumComplexity()->getAverageCyclomaticComplexityByClass() / $metric->getCount(),
            2
        );

        return "$count";
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function phpmetricsAvgBugsByClass(array $artifacts)
    {
        $metric = PhpmetricsSumFactory::create($artifacts);

        $count = round(
            $metric->getSumBug()->getAverageBugsByClass() / $metric->getCount(),
            2
        );

        return "$count";
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function phpmetricsTotalLoc(array $artifacts): string
    {
        /** @var Report|null $report */
        $report = $this->getReport($artifacts);

        if (empty($report)) {
            return 'NC';
        }

        return "{$report->getLoc()->getLinesOfCode()}";
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function phpmetricsSumLoc(array $artifacts): string
    {
        $metric = PhpmetricsSumFactory::create($artifacts)->getSumLoc();

        return "{$metric->getLinesOfCode()}";
    }

    /**
     * @param string              $htmlElement
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function graphPhpmetricsSumViolations(string $htmlElement, array $artifacts)
    {
        $dataSets = <<<EOS
{
                label: 'Critical',
                backgroundColor: [
                    color(window.chartColors.red).alpha(0.5).rgbString(),
                    color(window.chartColors.orange).alpha(0.5).rgbString(),
                    color(window.chartColors.yellow).alpha(0.5).rgbString(),
                ],
                borderColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                ],
                borderWidth: 1,
                data: [%s, %s, %s]
            }
EOS;

        /** @var PhpmetricsSum $metric */
        $metric = PhpmetricsSumFactory::create($artifacts);

        return sprintf(
            self::VIOLATION_TEMPLATE,
            "'Critical', 'Error', 'Warning'",
            sprintf(
                $dataSets,
                $metric->getSumViolation()->getCritical(),
                $metric->getSumViolation()->getError(),
                $metric->getSumViolation()->getWarning()
            ),
            $htmlElement
        );
    }

    /**
     * @param string              $htmlElement
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function graphPhpmetricsViolations(string $htmlElement, array $artifacts)
    {
        $dataSets = <<<EOS
{
                label: 'Critical',
                backgroundColor: [
                    color(window.chartColors.red).alpha(0.5).rgbString(),
                    color(window.chartColors.orange).alpha(0.5).rgbString(),
                    color(window.chartColors.yellow).alpha(0.5).rgbString(),
                ],
                borderColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                ],
                borderWidth: 1,
                data: [%s, %s, %s]
            }
EOS;

        $report = $this->getReport($artifacts);
        if (empty($report)) {
            $criticals = 'NC';
            $errors = 'NC';
            $warning = 'NC';
        } else {
            $criticals = $report->getViolation()->getCritical();
            $errors = $report->getViolation()->getError();
            $warning = $report->getViolation()->getWarning();
        }

        return sprintf(
            self::VIOLATION_TEMPLATE,
            "'Critical', 'Error', 'Warning'",
            sprintf(
                $dataSets,
                $criticals,
                $errors,
                $warning
            ),
            $htmlElement
        );
    }

    /**
     * @param string              $htmlElement
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function graphPhpmetricsAverages(string $htmlElement, array $artifacts)
    {
        /** @var Report $report */
        $report = $this->getReport($artifacts);

        $report = $this->getReport($artifacts);
        if (empty($report)) {
            $avgCc = 'NC';
            $avgDiff = 'NC';
            $lack = 'NC';
            $inst = 'NC';
        } else {
            $avgCc = $report->getComplexity()->getAverageCyclomaticComplexityByClass();
            $avgDiff = $report->getComplexity()->getAverageDifficulty();
            $lack = $report->getOop()->getLackOfCohesionOfMethods();
            $inst = $report->getCoupling()->getAverageInstability();
        }

        return sprintf(
            self::AVG_TEMPLATE,
            "['Complexity','Cyclomatic'],['Complexity','Difficulty'], ['Oop','Lack of cohesion'],['Coupling','Instability']",
            "{$avgCc}," .
            "{$avgDiff}," .
            "{$lack}," .
            "{$inst}",
            $htmlElement
        );
    }

    /**
     * @param string              $htmlElement
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function graphPhpmetricsSumAverages(string $htmlElement, array $artifacts)
    {
        /** @var PhpmetricsSum $metric */
        $metric = PhpmetricsSumFactory::create($artifacts);

        return sprintf(
            self::AVG_TEMPLATE,
            "['Complexity','Cyclomatic'],['Complexity','Difficulty'], ['Oop','Lack of cohesion'],['Coupling','Instability']",
            "{$metric->getSumComplexity()->getAverageCyclomaticComplexityByClass()}," .
            "{$metric->getSumComplexity()->getAverageDifficulty()}," .
            "{$metric->getSumOop()->getLackOfCohesionOfMethods()}," .
            "{$metric->getSumCoupling()->getAverageInstability()}",
            $htmlElement
        );
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return Report|null
     */
    private function getReport(array $artifacts)
    {
        /** @var Report|null $report */
        $report = null;

        /** @var PhpmetricLogFile|null $artifact */
        foreach ($artifacts as $artifact) {
            if (!$artifact instanceof PhpmetricLogFile) {
                continue;
            }
            $report = $artifact->getReport();
        }

        return $report;
    }
}
