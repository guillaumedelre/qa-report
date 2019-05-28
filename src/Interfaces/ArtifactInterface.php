<?php
declare(strict_types=1);

namespace Agilicode\QAT\Interfaces;

interface ArtifactInterface
{
    /**
     * @return string
     */
    public function getProject(): string;

    /**
     * @return string
     */
    public function getVendor(): string;

    /**
     * @return string
     */
    public function getFile(): string;

    /**
     * @return mixed
     */
    public function getReport();

    /**
     * @return bool
     */
    public function isValid(): bool;

}
