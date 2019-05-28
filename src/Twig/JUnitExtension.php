<?php
declare(strict_types=1);

namespace Agilicode\QAT\Twig;

use Agilicode\QAT\Factory\JUnitSumFactory;
use Agilicode\QAT\Interfaces\ArtifactInterface;
use Khill\Duration\Duration;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class JUnitExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('junitSumTests', [$this, 'junitSumTests']),
            new TwigFunction('junitSumTime', [$this, 'junitSumTime']),
        ];
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function junitSumTests(array $artifacts): string
    {
        $totalTests = JUnitSumFactory::create($artifacts)->getTests();

        return "{$totalTests}";
    }

    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return string
     */
    public function junitSumTime(array $artifacts): string
    {
        $totalTime = JUnitSumFactory::create($artifacts)->getTime();
        $duration = new Duration();
        $seconds = $duration->toSeconds($totalTime, true);
        $humanize = $duration->humanize($seconds);
        $elapsedTime = empty($humanize) ? '-' : $humanize;

        return "{$elapsedTime}";
    }
}
