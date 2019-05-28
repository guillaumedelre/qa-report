<?php
declare(strict_types=1);

namespace Agilicode\QAT\Collector;

use Agilicode\QAT\Exception\NoCollectorFoundException;
use Agilicode\QAT\Interfaces\ArtifactInterface;
use Agilicode\QAT\Interfaces\CollectorInterface;
use Symfony\Component\Finder\SplFileInfo;

final class ChainCollector implements CollectorInterface
{
    /**
     * @var array
     */
    protected $collectors = [];

    /**
     * @var array
     */
    protected $collectorByFormat = [];

    /**
     * @param CollectorInterface[] $collectors
     */
    public function __construct(array $collectors = [])
    {
        $this->collectors = $collectors;
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
        return $this->getCollector($splFileInfo, $context)->collect($splFileInfo, $context);
    }

    /**
     * @param SplFileInfo $splFileInfo
     * @param array       $context
     *
     * @return bool
     */
    public function supportsCollecting(SplFileInfo $splFileInfo, array $context = []): bool
    {
        try {
            $this->getCollector($splFileInfo, $context);
        } catch (NoCollectorFoundException $e) {
            // todo: log something
            return false;
        }

        return true;
    }

    /**
     * Gets the collector supporting the file.
     *
     * @param SplFileInfo $splFileInfo
     * @param array       $context
     *
     * @return CollectorInterface
     *
     * @throws NoCollectorFoundException
     */
    private function getCollector(SplFileInfo $splFileInfo, array $context): CollectorInterface
    {
        $hash = hash_file('SHA256', $splFileInfo->getRealPath());
        if (isset($this->collectorByFormat[$hash])
            && isset($this->collectors[$this->collectorByFormat[$hash]])
        ) {
            return $this->collectors[$this->collectorByFormat[$hash]];
        }

        foreach ($this->collectors as $i => $renderer) {
            if ($renderer->supportsCollecting($splFileInfo, $context)) {
                $this->collectorByFormat[$hash] = $i;

                return $renderer;
            }
        }

        throw new NoCollectorFoundException('No collector found for this file');
    }
}
