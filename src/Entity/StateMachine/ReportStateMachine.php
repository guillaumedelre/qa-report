<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\StateMachine;

use Agilicode\QAT\Core\Project;
use Agilicode\QAT\Interfaces\ArtifactInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ReportStateMachine
{
    /**
     * @var SymfonyStyle
     */
    protected $io;

    /**
     * @var Project[]
     */
    protected $projects = [];

    /**
     * @var ArtifactInterface[]
     */
    protected $artifacts = [];

    /**
     * @var array
     */
    protected $vendors = [];

    /**
     * @var string
     */
    public $marking;

    /**
     * @param SymfonyStyle $io
     * @param Project[]    $projects
     */
    public function __construct(SymfonyStyle $io, array $projects)
    {
        $this->io = $io;
        $this->projects = $projects;
    }

    /**
     * @return SymfonyStyle
     */
    public function getIo(): SymfonyStyle
    {
        return $this->io;
    }

    /**
     * @return Project[]
     */
    public function getProjects(): array
    {
        return $this->projects;
    }

    /**
     * @return ArtifactInterface[]
     */
    public function getArtifacts(): array
    {
        return $this->artifacts;
    }

    /**
     * @param ArtifactInterface $artifact
     */
    public function addArtifact(ArtifactInterface $artifact)
    {
        $this->artifacts[] = $artifact;
    }

    /**
     * @return array
     */
    public function getVendors(): array
    {
        return $this->vendors;
    }

    /**
     * @param string $vendor
     */
    public function addVendor(string $vendor)
    {
        if (in_array($vendor, $this->vendors)) {
            return;
        }

        $this->vendors[] = $vendor;
    }
}
