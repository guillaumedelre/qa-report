<?php
declare(strict_types=1);

namespace Agilicode\QAT\Interfaces;

use Agilicode\QAT\Exception\CollectException;
use Agilicode\QAT\Exception\NoCollectorFoundException;
use Agilicode\QAT\Exception\StoreException;
use Symfony\Component\Finder\SplFileInfo;

interface CollectorInterface
{
    /**
     * @param SplFileInfo $splFileInfo
     * @param array       $context
     *
     * @return ArtifactInterface
     * @throws NoCollectorFoundException
     * @throws CollectException
     */
    public function collect(SplFileInfo $splFileInfo, array $context = []): ArtifactInterface;

    /**
     * @param SplFileInfo $splFileInfo
     * @param array       $context
     *
     * @return bool
     */
    public function supportsCollecting(SplFileInfo $splFileInfo, array $context = []): bool;
}
