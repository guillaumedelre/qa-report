<?php
declare(strict_types=1);

namespace Agilicode\QAT\Interfaces;

interface ProjectInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return array
     */
    public function retrieveArtifacts(): array;
}
