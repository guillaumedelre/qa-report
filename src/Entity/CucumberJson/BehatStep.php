<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\CucumberJson;

class BehatStep
{
    public const STATUS_FAILED = 'failed';
    public const STATUS_PASSED = 'passed';
    public const STATUS_SKIPPED = 'skipped';
    public const STATUS_PENDING = 'pending';

    /**
     * @var string|null
     */
    protected  $keyword;

    /**
     * @var string|null
     */
    protected  $name;

    /**
     * @var int|null
     */
    protected  $line;

    /**
     * @var string|null
     */
    protected  $resultStatus;

    /**
     * @var string|null
     */
    protected  $resultErrorMessage;

    /**
     * value in seconds
     * @var float|null
     */
    protected  $resultDuration;

    /**
     * @var array
     */
    protected  $arguments = [];

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
     * @return BehatStep
     */
    public function setKeyword(?string $keyword): BehatStep
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
     * @return BehatStep
     */
    public function setName(?string $name): BehatStep
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
     * @return BehatStep
     */
    public function setLine(?int $line): BehatStep
    {
        $this->line = $line;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getResultStatus(): ?string
    {
        return $this->resultStatus;
    }

    /**
     * @param string|null $resultStatus
     *
     * @return BehatStep
     */
    public function setResultStatus(?string $resultStatus): BehatStep
    {
        $this->resultStatus = $resultStatus;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getResultErrorMessage(): ?string
    {
        return $this->resultErrorMessage;
    }

    /**
     * @param string|null $resultErrorMessage
     *
     * @return BehatStep
     */
    public function setResultErrorMessage(?string $resultErrorMessage): BehatStep
    {
        $this->resultErrorMessage = $resultErrorMessage;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getResultDuration(): ?float
    {
        return $this->resultDuration / 1000000000;
    }

    /**
     * @param float|null $resultDuration
     *
     * @return BehatStep
     */
    public function setResultDuration(?float $resultDuration): BehatStep
    {
        $this->resultDuration = $resultDuration;
        return $this;
    }

    /**
     * @return array
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * @param array $arguments
     *
     * @return BehatStep
     */
    public function setArguments(array $arguments): BehatStep
    {
        $this->arguments = $arguments;
        return $this;
    }
}
