<?php
declare(strict_types=1);

namespace Agilicode\QAT\Twig;

use Agilicode\QAT\Entity\CucumberJson\BehatStep;
use Agilicode\QAT\Factory\CucumberJsonAnalyseFactory;
use Agilicode\QAT\Interfaces\ArtifactInterface;
use Doctrine\Common\Inflector\Inflector;
use Khill\Duration\Duration;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CucumberJsonExtension extends AbstractExtension
{
    private const DOUGHNUT_JS_CONF = <<<EOS
        new Chart(
            document.getElementById('%s').getContext('2d'), 
            {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [%s],
                        borderWidth: 1,
                        backgroundColor: [%s],
                        label: '%s'
                    }],
                    labels: [%s]
                },
                options: {
                    responsive: true,
                    tooltips: true,
                    legend: {
                        display: false,
                        position: 'bottom',
                        labels: {
                            usePointStyle: false
                        }
                    },
                    tooltips: {
                        enabled: true,
                        mode: 'index',
                        position: 'nearest'
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                }
            }
        );
EOS;

    public function getFunctions()
    {
        return [
            new TwigFunction('cucumberDoughnutBenchFeature', [$this, 'cucumberDoughnutBenchFeature']),
            new TwigFunction('cucumberDoughnutBenchScenario', [$this, 'cucumberDoughnutBenchScenario']),
            new TwigFunction('cucumberDoughnutFeature', [$this, 'cucumberDoughnutFeature']),
            new TwigFunction('cucumberDoughnutScenario', [$this, 'cucumberDoughnutScenario']),
            new TwigFunction('cucumberDoughnutStep', [$this, 'cucumberDoughnutStep']),
            new TwigFunction('cucumberTotalTime', [$this, 'cucumberTotalTime']),
            new TwigFunction('cucumberAvgTimeByFeature', [$this, 'cucumberAvgTimeByFeature']),
            new TwigFunction('cucumberAvgTimeByScenario', [$this, 'cucumberAvgTimeByScenario']),
            new TwigFunction('cucumberSumFeatures', [$this, 'cucumberSumFeatures']),
            new TwigFunction('cucumberSumScenario', [$this, 'cucumberSumScenario']),
            new TwigFunction('cucumberSumSteps', [$this, 'cucumberSumSteps']),
        ];
    }

    /**
     * @param string              $htmlElement
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function cucumberDoughnutStep(string $htmlElement, array $artifacts): string
    {
        $analyse = CucumberJsonAnalyseFactory::create($artifacts);

        return sprintf(
            self::DOUGHNUT_JS_CONF,
            $htmlElement,
            "{$analyse->getStatusRatioForStep()['success']}, {$analyse->getStatusRatioForStep()['fail']}",
            'window.chartColors.green,window.chartColors.red',
            'Steps',
            '"Success","Fail"',
            $htmlElement
        );
    }

    /**
     * @param string              $htmlElement
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function cucumberDoughnutScenario(string $htmlElement, array $artifacts): string
    {
        $analyse = CucumberJsonAnalyseFactory::create($artifacts);

        return sprintf(
            self::DOUGHNUT_JS_CONF,
            $htmlElement,
            "{$analyse->getStatusRatioForScenarios()['success']}, {$analyse->getStatusRatioForScenarios()['fail']}",
            'window.chartColors.green,window.chartColors.red',
            'Scenario',
            '"Success","Fail"',
            $htmlElement
        );
    }

    /**
     * @param string $htmlElement
     * @param array  $artifacts
     *
     * @return string
     */
    public function cucumberDoughnutFeature(string $htmlElement, array $artifacts): string
    {
        $analyse = CucumberJsonAnalyseFactory::create($artifacts);

        $data = [];
        $labels = [];
        $colors = [];

        foreach ($analyse->getStepsRatioForFeatures() as $key => $value) {
            $labels[] = "'$key'";
            $data[] = $value;
            switch ($key) {
                case BehatStep::STATUS_FAILED:
                    $colors[] = 'window.chartColors.red';
                    break;
                case BehatStep::STATUS_PASSED:
                    $colors[] = 'window.chartColors.green';
                    break;
                case BehatStep::STATUS_PENDING:
                    $colors[] = 'window.chartColors.orange';
                    break;
                case BehatStep::STATUS_SKIPPED:
                    $colors[] = 'window.chartColors.purple';
                    break;
            }
        }

        return sprintf(
            self::DOUGHNUT_JS_CONF,
            $htmlElement,
            implode(',', $data),
            implode(',', $colors),
            'Feature',
            implode(',', $labels),
            $htmlElement
        );
    }

    /**
     * @param string $htmlElement
     * @param array  $artifacts
     *
     * @return string
     */
    public function cucumberDoughnutBenchFeature(string $htmlElement, array $artifacts): string
    {
        $analyse = CucumberJsonAnalyseFactory::create($artifacts);

        $labels = [];
        $colors = [];
        foreach ($analyse->getBenchForFeatures() as $item) {
            $label = preg_replace( "/\r|\n|'|\"/", "", $item['feature'] ?? '' );
            $label = Inflector::tableize($label);
            $labels[] = "'$label'";
            $colors[] = $item['elapsedTime'] > 60 ?  'window.chartColors.red' : 'window.chartColors.green';
        }

        $data = [];
        foreach ($analyse->getBenchForFeatures() as $item) {
            $data[] = $item['elapsedTime'];
        }

        return sprintf(
            self::DOUGHNUT_JS_CONF,
            $htmlElement,
            implode(',', $data),
            implode(',', $colors),
            'Time by feature',
            implode(',', $labels),
            $htmlElement
        );
    }

    /**
     * @param string $htmlElement
     * @param array  $artifacts
     *
     * @return string
     */
    public function cucumberDoughnutBenchScenario(string $htmlElement, array $artifacts): string
    {
        $analyse = CucumberJsonAnalyseFactory::create($artifacts);

        $labels = [];
        $colors = [];
        foreach ($analyse->getBenchForScenarios() as $item) {
            $label = preg_replace( "/\r|\n|'|\"/", "", $item['scenario'] ?? '' );
            $label = Inflector::tableize($label);
            $labels[] = "'$label'";
            $colors[] = $item['elapsedTime'] > 30 ?  'window.chartColors.red' : 'window.chartColors.green';
        }

        $data = [];
        foreach ($analyse->getBenchForScenarios() as $item) {
            $data[] = $item['elapsedTime'];
        }

        return sprintf(
            self::DOUGHNUT_JS_CONF,
            $htmlElement,
            implode(',', $data),
            implode(',', $colors),
            'Time by scenario',
            implode(',', $labels),
            $htmlElement
        );
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function cucumberSumFeatures(array $artifacts): string
    {
        $analyse = CucumberJsonAnalyseFactory::create($artifacts);
        $count = \count($analyse->getFeatures());

        return "{$count}";
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function cucumberSumScenario(array $artifacts): string
    {
        $analyse = CucumberJsonAnalyseFactory::create($artifacts);

        return "{$analyse->getTotalScenario()}";
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function cucumberSumSteps(array $artifacts): string
    {
        $analyse = CucumberJsonAnalyseFactory::create($artifacts);

        return "{$analyse->getTotalStep()}";
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function cucumberTotalTime(array $artifacts): string
    {
        $analyse = CucumberJsonAnalyseFactory::create($artifacts);

        $duration = new Duration();
        $seconds = $duration->toSeconds($analyse->getTotalTime(), true);
        $humanize = $duration->humanize($seconds);
        $elapsedTime = empty($humanize) ? '-' : $humanize;

        return "{$elapsedTime}";
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function cucumberAvgTimeByFeature(array $artifacts): string
    {
        $analyse = CucumberJsonAnalyseFactory::create($artifacts);

        $duration = new Duration();
        $seconds = $duration->toSeconds($analyse->getAverageTimeByFeature(), true);
        $humanize = $duration->humanize($seconds);
        $elapsedTime = empty($humanize) ? '-' : $humanize;

        return "{$elapsedTime}";
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function cucumberAvgTimeByScenario(array $artifacts): string
    {
        $analyse = CucumberJsonAnalyseFactory::create($artifacts);

        $duration = new Duration();
        $seconds = $duration->toSeconds($analyse->getAverageTimeByScenario(), true);
        $humanize = $duration->humanize($seconds);
        $elapsedTime = empty($humanize) ? '-' : $humanize;

        return "{$elapsedTime}";
    }
}
