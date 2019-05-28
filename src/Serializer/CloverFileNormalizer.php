<?php
declare(strict_types=1);

namespace Agilicode\QAT\Serializer;

use Agilicode\QAT\Entity\Clover\CloverFile;
use Codacy\Coverage\Parser\CloverParser;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;

final class CloverFileNormalizer implements ContextAwareDenormalizerInterface
{
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $object = new CloverFile();

        try {
            $report = (new CloverParser($context['file']))->makeReport();
            $object->setIsValid(true);
        } catch (\ErrorException $e) {
            $object->setIsValid(false);
            $report = null;
        }

        $object
            ->setProject($context['project_name'])
            ->setVendor($context['vendor'])
            ->setFile($context['file'])
            ->setReport($report)
        ;

        return $object;
    }

    public function supportsDenormalization($data, $type, $format = null, array $context = [])
    {
        return CloverFile::class === $type
            && XmlEncoder::FORMAT === $format
            && !empty($data['@generated'])
            && !empty($data['project'])
            && !empty($context['file'])
            && !empty($context['vendor'])
            && !empty($context['project_name']);
    }
}
