<?php
declare(strict_types=1);

namespace Agilicode\QAT\Collector;

use Agilicode\QAT\Entity\Phpmetrics\PhpmetricLogFile;
use Agilicode\QAT\Exception\NoCollectorFoundException;
use Agilicode\QAT\Exception\PhpmetricLogCollectException;
use Agilicode\QAT\Interfaces\ArtifactInterface;
use Agilicode\QAT\Interfaces\CollectorInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\SerializerInterface;

final class PhpmetricLogCollector implements CollectorInterface
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var JsonEncoder
     */
    private $jsonEncoder;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @param SerializerInterface $serializer
     * @param JsonEncoder         $jsonEncoder
     * @param Filesystem          $filesystem
     */
    public function __construct(
        SerializerInterface $serializer,
        JsonEncoder $jsonEncoder,
        Filesystem $filesystem
    ) {
        $this->serializer = $serializer;
        $this->jsonEncoder = $jsonEncoder;
        $this->filesystem = $filesystem;
    }

    /**
     * @param SplFileInfo $splFileInfo
     * @param array       $context
     *
     * @return ArtifactInterface
     * @throws NoCollectorFoundException
     */
    public function collect(SplFileInfo $splFileInfo, array $context = []): ArtifactInterface
    {
        $json = $this->jsonEncoder->encode(
            ['custom_log' => $splFileInfo->getContents()],
            JsonEncoder::FORMAT
        );

        try {
            /** @var PhpmetricLogFile $object */
            $object = $this->serializer->deserialize(
                $json,
                PhpmetricLogFile::class,
                JsonEncoder::FORMAT,
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

        return mb_strpos($fileContent, 'LOC')
            && mb_strpos($fileContent, 'Object oriented programming')
            && mb_strpos($fileContent, 'Coupling')
            && mb_strpos($fileContent, 'Complexity')
            && mb_strpos($fileContent, 'Bugs')
            && mb_strpos($fileContent, 'Violations');
    }
}
