<?php
declare(strict_types=1);

namespace Agilicode\QAT\Interfaces;

use Psr\Container\ContainerInterface;

interface ProjectContainerInterface extends ContainerInterface
{
    /**
     * @return ProjectInterface[]
     */
    public function all(): array;
}
