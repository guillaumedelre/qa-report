<?php
declare(strict_types=1);

namespace Agilicode\QAT\Serializer;

use Agilicode\QAT\Entity\CucumberJson\BehatStep;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;

class BehatStepNormalizer implements ContextAwareDenormalizerInterface
{
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $object = new BehatStep();
        $object->setName($data['name']);
        $object->setLine($data['line']);
        $object->setKeyword($data['keyword']);
        $object->setKeyword($data['keyword']);
        $object->setArguments($data['arguments']);
        $object->setResultDuration($data['result']['duration'] ?? 0);
        $object->setResultStatus($data['result']['status']);
        $object->setResultErrorMessage($data['result']['error_message']);

        return $object;
    }

    public function supportsDenormalization($data, $type, $format = null, array $context = [])
    {
        return BehatStep::class === $type
            && JsonEncoder::FORMAT === $format;
    }

}
