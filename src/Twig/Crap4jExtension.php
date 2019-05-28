<?php
declare(strict_types=1);

namespace Agilicode\QAT\Twig;

use Agilicode\QAT\Entity\Crap4j\Crap4jReport;
use Agilicode\QAT\Entity\Crap4j\Crap4jFile;
use Agilicode\QAT\Factory\CloverSumFactory;
use Agilicode\QAT\Factory\Crap4jSumFactory;
use Agilicode\QAT\Interfaces\ArtifactInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Crap4jExtension extends AbstractExtension
{
    private const TEMPLATE = <<<EOS

    var crapBarChartData = {
        labels: [%s],
        datasets: [{
            label: 'Crap',
            backgroundColor: color(window.chartColors.purple).alpha(0.5).rgbString(),
            borderColor: window.chartColors.purple,
            borderWidth: 1,
            data: [%s]
        }, {
            label: 'Complexity',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: [%s]
        }]
    };

    new Chart(document.getElementById('%s').getContext('2d'), {
        type: 'bar',
        data: crapBarChartData,
        options: {
            responsive: true,
            tooltips: true,
            legend: {
                position: 'top',
                labels: {
                    usePointStyle: false
                }
            },
            tooltips: {
                enabled: true,
                mode: 'index',
                position: 'nearest'
            }
        }
    });
EOS;

    public function getFunctions()
    {
        return [
            new TwigFunction('graphCrap', [$this, 'graphCrap']),
            new TwigFunction('crapAvgPercent', [$this, 'crapAvgPercent']),
        ];
    }


    /**
     * @param array $artifacts
     *
     * @return string
     */
    public function crapAvgPercent(array $artifacts): string
    {
        $sum = Crap4jSumFactory::create($artifacts);
        $percent = round($sum->getCrapMethodPercent() / $sum->getCount());

        return "{$percent}";
    }

    /**
     * @param string              $htmlElement
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function graphCrap(string $htmlElement, array $artifacts)
    {
        /** @var Crap4jReport $report */
        $report = $this->getReport($artifacts);

        $methods = [];
        if (!empty($report)) {
            $methods = $report->getMethods();
        }
        $methodNames = [];
        $crSet = [];
        $ccSet = [];
        foreach (current($methods) as $method) {
            $classNameParts = explode('\\', $method['className']);
            $className = array_pop($classNameParts);
            $methodNames[] = "'{$className}::{$method['methodName']}'";
            $ccSet[] = $method['crap'];
            $crSet[] = $method['complexity'];
        }

        return sprintf(
            self::TEMPLATE,
            implode(',', $methodNames),
            implode(',', $crSet),
            implode(',', $ccSet),
            $htmlElement
        );
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return Crap4jReport|null
     */
    private function getReport(array $artifacts)
    {
        /** @var Crap4jReport|null $report */
        $report = null;

        /** @var Crap4jFile|null $artifact */
        foreach ($artifacts as $artifact) {
            if (!$artifact instanceof Crap4jFile) {
                continue;
            }
            $report = $artifact->getReport();
        }

        return $report;
    }
}
