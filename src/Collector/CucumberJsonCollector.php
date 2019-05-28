<?php
declare(strict_types=1);

namespace Agilicode\QAT\Collector;

use Agilicode\QAT\Entity\CucumberJson\CucumberJsonFile;
use Agilicode\QAT\Exception\CucumberJsonCollectException;
use Agilicode\QAT\Interfaces\ArtifactInterface;
use Agilicode\QAT\Interfaces\CollectorInterface;
use JsonSchema\Validator;
use Swaggest\JsonSchema\InvalidValue;
use Swaggest\JsonSchema\Schema;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\SerializerInterface;

class CucumberJsonCollector implements CollectorInterface
{
    /**
     * @var JsonEncoder
     */
    protected $jsonEncoder;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param JsonEncoder $jsonEncoder
     * @param SerializerInterface $serializer
     */
    public function __construct(JsonEncoder $jsonEncoder, SerializerInterface $serializer)
    {
        $this->jsonEncoder = $jsonEncoder;
        $this->serializer = $serializer;
    }

    public function collect(SplFileInfo $splFileInfo, array $context = []): ArtifactInterface
    {
        try {
            /** @var CucumberJsonFile $object */
            $object = $this->serializer->deserialize(
                $splFileInfo->getContents(),
                CucumberJsonFile::class,
                JsonEncoder::FORMAT,
                $context + ['file' => $splFileInfo->getRealPath()]
            );
            $object->setIsValid(true);
        } catch (UnexpectedValueException $e) {
            $object->setIsValid(false);
        }

        return $object;
    }

    public function supportsCollecting(SplFileInfo $splFileInfo, array $context = []): bool
    {
        $fileContent = $splFileInfo->getContents();

        preg_match_all('/^\[{.*}\]$/', $fileContent, $matches);
        if (empty(current($matches))) {
            return false;
        }

        try {
            $schema = $this->jsonEncoder->decode(
                file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'cucumber_json_schema.json'),
                JsonEncoder::FORMAT,
                [JsonDecode::ASSOCIATIVE => false]
            );
            $json = $this->jsonEncoder->decode(
                $splFileInfo->getContents(),
                JsonEncoder::FORMAT,
                [JsonDecode::ASSOCIATIVE => false]
            );
        } catch (UnexpectedValueException $e) {
            return false;
        }

        try {
            $schema = Schema::import($schema);
            $schema->in($json);
        } catch (InvalidValue $e) {
            dump($e->getMessage());
            return false;
        }

        return true;
    }

}
