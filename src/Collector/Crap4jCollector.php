<?php
declare(strict_types=1);

namespace Agilicode\QAT\Collector;

use Agilicode\QAT\Entity\Crap4j\Crap4jFile;
use Agilicode\QAT\Exception\CollectException;
use Agilicode\QAT\Exception\Crap4jCollectException;
use Agilicode\QAT\Interfaces\ArtifactInterface;
use Agilicode\QAT\Interfaces\CollectorInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\SerializerInterface;

final class Crap4jCollector implements CollectorInterface
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var XmlEncoder
     */
    private $xmlEncoder;

    /**
     * @param SerializerInterface $serializer
     * @param Filesystem          $filesystem
     * @param XmlEncoder          $xmlEncoder
     */
    public function __construct(
        SerializerInterface $serializer,
        Filesystem $filesystem,
        XmlEncoder $xmlEncoder
    ) {
        $this->serializer = $serializer;
        $this->filesystem = $filesystem;
        $this->xmlEncoder = $xmlEncoder;
    }

    /**
     * @param SplFileInfo $splFileInfo
     * @param array       $context
     *
     * @return  ArtifactInterface
     * @throws CollectException
     */
    public function collect(SplFileInfo $splFileInfo, array $context = []): ArtifactInterface
    {
        try {
            /** @var Crap4jFile $object */
            $object = $this->serializer->deserialize(
                $splFileInfo->getContents(),
                Crap4jFile::class,
                XmlEncoder::FORMAT,
                $context + ['file' => $splFileInfo->getRealPath()]
            );
            $object->setIsValid(true);
        } catch (UnexpectedValueException $e) {
            $object->setIsValid(false);
        }

        return $object;
    }

    /**
     * @param SplFileInfo $splFileInfo
     * @param array       $context
     *
     * @return bool
     */
    public function supportsCollecting(SplFileInfo $splFileInfo, array $context = []): bool
    {
        $fileContent = $splFileInfo->getContents();

        $preCheck = mb_strpos($fileContent, '<crap_result>') && mb_strpos($fileContent, '</crap_result>');
        if (!$preCheck) {
            return false;
        }

        try {
            $data = $this->xmlEncoder->decode($fileContent, XmlEncoder::FORMAT);
        } catch (UnexpectedValueException $e) {
            // todo: log something
            return false;
        }

        return $preCheck
            && isset($data['project'])
            && isset($data['timestamp'])
            && isset($data['stats'])
            && isset($data['methods']);
    }
}
