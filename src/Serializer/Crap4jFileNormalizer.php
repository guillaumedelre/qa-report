<?php
declare(strict_types=1);

namespace Agilicode\QAT\Serializer;

use Agilicode\QAT\Entity\Crap4j\Crap4jReport;
use Agilicode\QAT\Entity\Crap4j\Crap4jFile;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;

final class Crap4jFileNormalizer implements ContextAwareDenormalizerInterface
{
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $report = (new Crap4jReport())
            ->setMethodCount(intval($data['stats']['methodCount']))
            ->setCrapMethodCount(intval($data['stats']['crapMethodCount']))
            ->setCrapLoad(intval($data['stats']['crapLoad']))
            ->setTotalCrap(intval($data['stats']['totalCrap']))
            ->setCrapMethodPercent(floatval($data['stats']['crapMethodPercent']))
            ->setMethods($data['methods'] ?? [])
            ;

        $object = (new Crap4jFile())
            ->setProject($context['project_name'])
            ->setVendor($context['vendor'])
            ->setFile($context['file'])
            ->setReport($report)
            ->setIsValid(true)
        ;

        return $object;
    }

    public function supportsDenormalization($data, $type, $format = null, array $context = [])
    {
        return Crap4jFile::class === $type
            && XmlEncoder::FORMAT === $format
            && !empty($data['stats'])
            && !empty($context['file'])
            && !empty($context['vendor'])
            && !empty($context['project_name']);
    }
}
