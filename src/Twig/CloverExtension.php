<?php
declare(strict_types=1);

namespace Agilicode\QAT\Twig;

use Agilicode\QAT\Entity\Clover\CloverFile;
use Agilicode\QAT\Factory\CloverSumFactory;
use Agilicode\QAT\Interfaces\ArtifactInterface;
use Codacy\Coverage\Report\CoverageReport;
use Codacy\Coverage\Report\FileReport;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CloverExtension extends AbstractExtension
{
    private const TEMPLATE = <<<EOS
            var sunburst = new Sunburst({
                colors: %s,
                breadcrumbs: {
                    w: 120,
                    h: 30,
                    s: 3,
                    t: 5
                },
                separator: '/'
            });
            sunburst.setData([%s]);
EOS;

    public function getFunctions()
    {
        return [
            new TwigFunction('sunburst', [$this, 'sunburst']),
            new TwigFunction('cloverAvgCoverage', [$this, 'cloverAvgCoverage']),
            new TwigFunction('cloverTotalCoverage', [$this, 'cloverTotalCoverage']),
        ];
    }

    /**
     * @param array $artifacts
     *
     * @return string
     */
    public function cloverAvgCoverage(array $artifacts): string
    {
        $sumClover = CloverSumFactory::create($artifacts);
        $avgCoverage = round($sumClover->getCoverage() / $sumClover->getCount());

        return "{$avgCoverage}";
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function cloverTotalCoverage(array $artifacts): string
    {
        /** @var CoverageReport|null $coverageReport */
        $coverageReport = null;
        foreach ($artifacts as $artifact) {
            if (!$artifact instanceof CloverFile) {
                continue;
            }
            $coverageReport = $artifact->getReport();
        }

        if (empty($coverageReport)) {
            return 'NC';
        }

        return "{$coverageReport->getTotal()}%";
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function sunburst(array $artifacts): string
    {
        return sprintf(self::TEMPLATE, $this->sunburstColors($artifacts), $this->sunburstData($artifacts));
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    private function sunburstColors(array $artifacts): string
    {
        /** @var CoverageReport|null $cloverFile */
        $coverageReport = null;
        $rootNS = null;
        foreach ($artifacts as $artifact) {
            if (!$artifact instanceof CloverFile) {
                continue;
            }
            $rootNS = ucfirst($artifact->getProject());
            $coverageReport = $artifact->getReport();
        }

        if (empty($coverageReport)) {
            return '{}';
        }

        $colors = [];
        /** @var FileReport $fileReport */
        foreach ($coverageReport->getFileReports() as $fileReport) {
            $filename = str_replace('.php', '', $fileReport->getFileName());
            $filename = substr($filename, strpos($filename, '/src/'));
            $filename = str_replace('/src/', "{$rootNS}/", $filename);
            $parts = explode('/', $filename);
            $part = array_pop($parts);
            if ($fileReport->getTotal() < 50) {
                $colors[] = "
                \"$part\":  \"#D9534F\"";
            }
            if ($fileReport->getTotal() >= 50 && $fileReport->getTotal() < 90) {
                $colors[] = "
                \"$part\":  \"#F0AC4E\"";
            }
            if ($fileReport->getTotal() >= 90) {
                $colors[] = "
                \"$part\":  \"#5CB85B\"";
            }
        }

        $javascript = '{' . trim(implode(',', $colors), ',') . '}';

        return $javascript;
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    private function sunburstData(array $artifacts): string
    {
        /** @var CoverageReport|null $cloverFile */
        $coverageReport = null;
        $rootNS = null;
        foreach ($artifacts as $artifact) {
            if (!$artifact instanceof CloverFile) {
                continue;
            }
            $rootNS = ucfirst($artifact->getProject());
            $coverageReport = $artifact->getReport();
        }

        if (empty($coverageReport)) {
            return '';
        }

        $dataSet = [];
        /** @var FileReport $fileReport */
        foreach ($coverageReport->getFileReports() as $fileReport) {
            $filename = str_replace('.php', '', $fileReport->getFileName());
            $filename = substr($filename, strpos($filename, '/src/'));
            $filename = str_replace('/src/', "{$rootNS}/", $filename);
            $dataSet[] = "
            [\"$filename\", {$fileReport->getTotal()}]";
        }

        $javascript = implode(',', $dataSet);

        return trim($javascript, ',');
    }

}
