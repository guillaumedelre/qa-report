<?php
declare(strict_types=1);

namespace Agilicode\QAT\Serializer;

use Agilicode\QAT\Entity\Phpmetrics\Bug;
use Agilicode\QAT\Entity\Phpmetrics\Complexity;
use Agilicode\QAT\Entity\Phpmetrics\Coupling;
use Agilicode\QAT\Entity\Phpmetrics\Loc;
use Agilicode\QAT\Entity\Phpmetrics\Oop;
use Agilicode\QAT\Entity\Phpmetrics\Package;
use Agilicode\QAT\Entity\Phpmetrics\Violation;
use Agilicode\QAT\Entity\Phpmetrics\PhpmetricLogFile;
use Agilicode\QAT\Factory\PhpmetricsReportFactory;
use Doctrine\Common\Inflector\Inflector;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;

final class PhpmetricLogFileNormalizer implements ContextAwareDenormalizerInterface
{
    private const PATTERN = '/^\s*(%s)\s*(\d+(?:[.,]\d+)?)$/m';

    public const LOG_LINES = [
        Loc::class => [
            'Lines of code',
            'Logical lines of code',
            'Comment lines of code',
            'Average volume',
            'Average comment weight',
            'Average intelligent content',
            'Logical lines of code by class',
            'Logical lines of code by method',
        ],
        Oop::class => [
            'Classes',
            'Interface',
            'Methods',
            'Methods by class',
            'Lack of cohesion of methods',
        ],
        Coupling::class => [
            'Average afferent coupling',
            'Average efferent coupling',
            'Average instability',
            'Depth of Inheritance Tree',
        ],
        Package::class => [
            'Packages',
            'Average classes per package',
            'Average distance',
            'Average incoming class dependencies',
            'Average outgoing class dependencies',
            'Average incoming package dependencies',
            'Average outgoing package dependencies',
        ],
        Complexity::class => [
            'Average Cyclomatic complexity by class',
            'Average Weighted method count by class',
            'Average Relative system complexity',
            'Average Difficulty',
        ],
        Bug::class => [
            'Average bugs by class',
            'Average defects by class (Kan)',
        ],
        Violation::class => [
            'Critical',
            'Error',
            'Warning',
            'Information',
        ],
    ];

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $object = (new PhpmetricLogFile())
            ->setProject($context['project_name'])
            ->setVendor($context['vendor'])
            ->setFile($context['file'])
        ;

        $fileContent = \file_get_contents($context['file']);
        $metrics = [];
        foreach (self::LOG_LINES as $class => $logLines) {
            $metric = new $class();
            foreach ($logLines as $logLine) {
               preg_match_all(
                    sprintf(self::PATTERN, $logLine),
                    $fileContent,
                    $matches
                );
                if (3 === \count($matches)) {
                    $metric->{'set'. Inflector::classify(current($matches[1]))}(intval(current($matches[2])));
                }
            }
            $metrics[] = $metric;
        }
        $object->setReport(PhpmetricsReportFactory::create($metrics));
        $object->setIsValid(true);

        return $object;
    }

    public function supportsDenormalization($data, $type, $format = null, array $context = [])
    {
        return PhpmetricLogFile::class === $type
            && JsonEncoder::FORMAT === $format
            && !empty($data)
            && !empty($context['file'])
            && !empty($context['vendor'])
            && !empty($context['project_name']);
    }

}
