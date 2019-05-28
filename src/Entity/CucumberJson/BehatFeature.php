<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\CucumberJson;

class BehatFeature
{
    /**
     * @var string|null
     */
    protected  $uri;

    /**
     * @var string|null
     */
    protected  $id;

    /**
     * @var BehatTag[]
     */
    protected  $tags = [];

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
     * @var BehatScenario[]
     */
    protected $elements = [];

    /**
     * @return string|null
     */
    public function getUri(): ?string
    {
        return $this->uri;
    }

    /**
     * @param string|null $uri
     *
     * @return BehatFeature
     */
    public function setUri(?string $uri): BehatFeature
    {
        $this->uri = $uri;
        return $this;
    }

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
     * @return BehatFeature
     */
    public function setId(?string $id): BehatFeature
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
     * @return BehatFeature
     */
    public function setTags(array $tags): BehatFeature
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
     * @return BehatFeature
     */
    public function setKeyword(?string $keyword): BehatFeature
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
     * @return BehatFeature
     */
    public function setName(?string $name): BehatFeature
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
     * @return BehatFeature
     */
    public function setLine(?int $line): BehatFeature
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
     * @return BehatFeature
     */
    public function setDescription(?string $description): BehatFeature
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return BehatScenario[]
     */
    public function getElements(): array
    {
        return $this->elements;
    }

    /**
     * @param BehatScenario[] $elements
     *
     * @return BehatFeature
     */
    public function setElements(array $elements): BehatFeature
    {
        $this->elements = $elements;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalTime(): float
    {
        $total = 0;
        foreach ($this->elements as $behatScenario) {
            $total += $behatScenario->getTotalTime();
        }

        return $total;
    }

    /**
     * @return int
     */
    public function getTotalStep(): int
    {
        $total = 0;
        foreach ($this->elements as $behatScenario) {
            $total += \count($behatScenario->getSteps());
        }

        return $total;
    }

    /**
     * @return int
     */
    public function getTotalScenario(): int
    {
        return \count($this->elements);
    }

    /**
     * @return array
     */
    public function getStepsGroupByStatus(): array
    {
        $statuses = [];
        foreach ($this->elements as $scenario) {
            foreach ($scenario->getStepsGroupByStatus() as $status => $value) {
                if (!isset($statuses[$status])) {
                    $statuses[$status] = 0;
                }
                $statuses[$status] += $value;
            }
        }

        return $statuses;
    }
}
