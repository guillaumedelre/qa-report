<?php
declare(strict_types=1);

namespace Agilicode\QAT\Serializer;

use Agilicode\QAT\Entity\Clover\CloverFile;
use Agilicode\QAT\Entity\CucumberJson\BehatFeature;
use Agilicode\QAT\Entity\CucumberJson\CucumberJsonFile;
use Agilicode\QAT\Entity\CucumberJson\CucumberJsonAnalyse;
use Codacy\Coverage\Parser\CloverParser;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;

final class CucumberJsonFileNormalizer implements ContextAwareDenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $object = new CucumberJsonFile();
        $object->setIsValid(true);
        $report = new CucumberJsonAnalyse();

        foreach ($data as $feature) {
            try {
                /** @var BehatFeature $feature */
                $feature = $this->denormalizer->denormalize($feature, BehatFeature::class, $format, $context);
                $report->addFeature($feature);
            } catch (UnexpectedValueException $e) {
                continue;
            }
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
        return CucumberJsonFile::class === $type
            && JsonEncoder::FORMAT === $format
            && !empty($data)
            && !empty($context['file'])
            && !empty($context['vendor'])
            && !empty($context['project_name']);
    }
}
