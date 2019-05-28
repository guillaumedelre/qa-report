<?php
declare(strict_types=1);

namespace Agilicode\QAT\Renderer;

use Agilicode\QAT\Exception\NoRendererFoundException;
use Agilicode\QAT\Interfaces\RendererInterface;

final class ChainRenderer implements RendererInterface
{
    /**
     * @var array
     */
    protected $renderers = [];

    /**
     * @var array
     */
    protected $rendererByFormat = [];

    /**
     * @param RendererInterface[] $renderers
     */
    public function __construct(array $renderers = [])
    {
        $this->renderers = $renderers;
    }

    /**
     * @param string $project
     * @param string $format
     * @param array  $context
     *
     * @throws NoRendererFoundException
     */
    public function render(string $project, string $format, array $context = []): void
    {
        $this->getRenderer($project, $format, $context)->render($project, $format, $context);
    }

    /**
     * @param string $project
     * @param string $format
     * @param array  $context
     *
     * @return bool
     */
    public function supportsCollecting(string $project, string $format, array $context = []): bool
    {
        try {
            $this->getRenderer($project, $format, $context);
        } catch (NoRendererFoundException $e) {
            // todo: log something
            return false;
        }

        return true;
    }

    /**
     * Gets the renderer supporting the format.
     *
     * @param string $project
     * @param string $format
     * @param array  $context
     *
     * @return RendererInterface
     *
     * @throws NoRendererFoundException
     */
    private function getRenderer(string $project, string $format, array $context): RendererInterface
    {
        if (isset($this->rendererByFormat[$format])
            && isset($this->renderers[$this->rendererByFormat[$format]])
        ) {
            return $this->renderers[$this->rendererByFormat[$format]];
        }

        foreach ($this->renderers as $i => $renderer) {
            if ($renderer->supportsCollecting($project, $format, $context)) {
                $this->rendererByFormat[$format] = $i;

                return $renderer;
            }
        }

        throw new NoRendererFoundException('No renderer found for this format');
    }
}
