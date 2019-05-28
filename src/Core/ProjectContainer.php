<?php
declare(strict_types=1);

namespace Agilicode\QAT\Core;

use Agilicode\QAT\Interfaces\ProjectInterface;
use Agilicode\QAT\Interfaces\ProjectContainerInterface;

final class ProjectContainer implements ProjectContainerInterface
{
    /**
     * @var Project[]
     */
    private $projects = [];

    /**
     * @param Project[] $projects
     */
    public function __construct(array $projects)
    {
        $this->projects = $projects;
    }

    /**
     * @param string $id
     *
     * @return Project|null
     */
    public function get($id): ?Project
    {
        if (!$this->has($id)) {
            return null;
        }

        foreach ($this->projects as $project) {
            if ($id !== $project->getName()) {
                continue;
            }
            return $project;
        }
    }

    /**
     * @param string $id
     *
     * @return bool
     */
    public function has($id): bool
    {
        foreach ($this->projects as $project) {
            if ($id !== $project->getName()) {
                continue;
            }
            return true;
        }

        return false;
    }

    /**
     * @return ProjectInterface[]
     */
    public function all(): array
    {
        return $this->projects;
    }

}
