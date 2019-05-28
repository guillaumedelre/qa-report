<?php
declare(strict_types=1);

namespace Agilicode\QAT\Collector;

use Agilicode\QAT\Entity\Clover\CloverFile;
use Agilicode\QAT\Exception\CloverCollectException;
use Agilicode\QAT\Interfaces\ArtifactInterface;
use Agilicode\QAT\Interfaces\CollectorInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\SerializerInterface;

final class CloverCollector implements CollectorInterface
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
     * @return ArtifactInterface
     * @throws CloverCollectException
     */
    public function collect(SplFileInfo $splFileInfo, array $context = []): ArtifactInterface
    {
        try {
            /** @var CloverFile $object */
            $object = $this->serializer->deserialize(
                $splFileInfo->getContents(),
                CloverFile::class,
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

        $preCheck = mb_strpos($fileContent, '<coverage') && mb_strpos($fileContent, '</coverage>');
        if (!$preCheck) {
            return false;
        }

        try {
            $data = $this->xmlEncoder->decode($fileContent, XmlEncoder::FORMAT);
        } catch (UnexpectedValueException $e) {
            // todo: log something
            return false;
        }

        return $preCheck && isset($data['project']);
    }
}
