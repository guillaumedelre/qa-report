<?php
declare(strict_types=1);

namespace Agilicode\QAT\Twig;

use Agilicode\QAT\Interfaces\ArtifactInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FileExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('filenameAndExtension', [$this, 'filenameAndExtension']),
            new TwigFunction('groupByProject', [$this, 'groupByProject']),
            new TwigFunction('filterByVendor', [$this, 'filterByVendor']),
            new TwigFunction('fileSize', [$this, 'fileSize']),
            new TwigFunction('fileContent', [$this, 'fileContent']),
            new TwigFunction('md5', [$this, 'md5']),
        ];
    }

    /**
     * @param ArtifactInterface[] $artifacts
     * @param string $vendor
     *
     * @return array
     */
    public function filterByVendor(array $artifacts, string $vendor): array
    {
        $filtered = [];
        foreach ($artifacts as $artifact) {
            if ($vendor !== $artifact->getVendor()) {
                continue;
            }
            $filtered[] = $artifact;
        }

        return $filtered;
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return array
     */
    public function groupByProject(array $artifacts): array
    {
        $groupBy = [];
        foreach ($artifacts as $artifact) {
            $groupBy[$artifact->getProject()][] = $artifact;
        }

        return $groupBy;
    }

    /**
     * @param string $filename
     *
     * @return string
     */
    public function md5(string $filename): string
    {
        return md5($filename);
    }

    /**
     * @param string $filename
     *
     * @return string
     */
    public function filenameAndExtension(string $filename): string
    {
        $filenameAndExtension = (\pathinfo($filename)['basename']);

        return $filenameAndExtension;
    }

    /**
     * @param string $filename
     *
     * @return string
     */
    public function fileContent(string $filename): string
    {
        $fileContent = \file_get_contents($filename);
        if (empty($fileContent)) {
            return '-';
        }

        return \json_encode(json_decode($fileContent), JSON_PRETTY_PRINT);
    }

    /**
     * @param string $filename
     *
     * @return string
     */
    public function fileSize(string $filename): string
    {
        $size = \filesize($filename);
        static $units = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $step = 1024;
        $i = 0;
        while (($size / $step) > 0.9) {
            $size = $size / $step;
            $i++;
        }
        return round($size, 1).$units[$i];
    }
}
