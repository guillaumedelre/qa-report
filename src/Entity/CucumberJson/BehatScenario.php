<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\CucumberJson;

class BehatScenario
{
    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var BehatTag[]
     */
    protected $tags = [];

    /**
     * @var string|null
     */
    protected $keyword;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var int|null
     */
    protected $line;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var string|null
     */
    protected $type;

    /**
     * @var BehatStep[]
     */
    protected $steps = [];

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     *
     * @return BehatScenario
     */
    public function setId(?string $id): BehatScenario
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return BehatTag[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param BehatTag[] $tags
     *
     * @return BehatScenario
     */
    public function setTags(array $tags): BehatScenario
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    /**
     * @param string|null $keyword
     *
     * @return BehatScenario
     */
    public function setKeyword(?string $keyword): BehatScenario
    {
        $this->keyword = $keyword;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return BehatScenario
     */
    public function setName(?string $name): BehatScenario
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLine(): ?int
    {
        return $this->line;
    }

    /**
     * @param int|null $line
     *
     * @return BehatScenario
     */
    public function setLine(?int $line): BehatScenario
    {
        $this->line = $line;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return BehatScenario
     */
    public function setDescription(?string $description): BehatScenario
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     *
     * @return BehatScenario
     */
    public function setType(?string $type): BehatScenario
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return BehatStep[]
     */
    public function getSteps(): array
    {
        return $this->steps;
    }

    /**
     * @param BehatStep[] $steps
     *
     * @return BehatScenario
     */
    public function setSteps(array $steps): BehatScenario
    {
        $this->steps = $steps;
        return $this;
    }

    /**
     * @return array
     */
    public function getStepsGroupByStatus(): array
    {
        $statuses = [];
        foreach ($this->steps as $step) {
            if (!isset($statuses[$step->getResultStatus()])) {
                $statuses[$step->getResultStatus()] = 0;
            }
            $statuses[$step->getResultStatus()] += 1;
        }

        return $statuses;
    }

    /**
     * @return float
     */
    public function getTotalTime(): float
    {
        $total = 0;
        foreach ($this->steps as $behatStep) {
            $total += $behatStep->getResultDuration();
        }

        return $total;
    }
}
