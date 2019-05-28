<?php
declare(strict_types=1);

namespace Agilicode\QAT\Interfaces;

use Agilicode\QAT\Exception\NoRendererFoundException;
use Agilicode\QAT\Exception\RenderException;

interface RendererInterface
{
    /**
     * @param string $project
     * @param string $format
     * @param array  $context
     *
     * @throws NoRendererFoundException
     * @throws RenderException
     */
    public function render(string $project, string $format, array $context = []): void;

    /**
     * @param string $project
     * @param string $format
     * @param array  $context
     *
     * @return bool
     */
    public function supportsCollecting(string $project, string $format, array $context = []): bool;
}
