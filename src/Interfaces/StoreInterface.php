<?php
declare(strict_types=1);

namespace Agilicode\QAT\Interfaces;

interface StoreInterface
{
    /**
     * @return array
     */
    public function all(): array;

    /**
     * @param ArtifactInterface $artifact
     *
     * @return StoreInterface
     */
    public function add(ArtifactInterface $artifact): StoreInterface;

    /**
     * @return array
     */
    public function allByProject(): array;

    /**
     * @return array
     */
    public function allByVendor(): array;

    /**
     * @return array
     */
    public function allByProjectAndVendor(): array;

}
