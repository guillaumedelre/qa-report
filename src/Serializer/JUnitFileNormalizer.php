<?php
declare(strict_types=1);

namespace Agilicode\QAT\Serializer;

use Agilicode\QAT\Entity\JUnit\JUnitFile;
use RazeSoldier\JUnitLogParser\Parser;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;

final class JUnitFileNormalizer implements ContextAwareDenormalizerInterface
{
    /**
     * @var XmlEncoder
     */
    protected $xmlEncoder;

    /**
     * @param XmlEncoder $xmlEncoder
     */
    public function __construct(XmlEncoder $xmlEncoder)
    {
        $this->xmlEncoder = $xmlEncoder;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!empty($data['@name'])) {
            unset($data['@name']);
        }

        $object = new JUnitFile();

        try {
            $xml = $this->xmlEncoder->encode($data, XmlEncoder::FORMAT, [XmlEncoder::ROOT_NODE_NAME => 'testsuites']);
            $report = (new Parser($xml, true))->getTestResult();
            $object->setIsValid(true);
        } catch (\DOMException | \ErrorException $e) {
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
        return JUnitFile::class === $type
            && XmlEncoder::FORMAT === $format
            && !empty($data['testsuite'])
            && !empty($context['file'])
            && !empty($context['vendor'])
            && !empty($context['project_name']);
    }
}
