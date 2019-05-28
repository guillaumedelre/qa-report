<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\JUnit;

class JUnitSum
{
    /**
     * @var int
     */
    protected $count = 0;

    /**
     * @var int
     */
    protected $tests = 0;

    /**
     * @var int
     */
    protected $failures = 0;

    /**
     * @var int
     */
    protected $errors = 0;

    /**
     * @var float
     */
    protected $time = .0;

    /**
     * @var null|int
     */
    protected $skipped = 0;

    /**
     * @var null|int
     */
    protected $assertions = 0;

    /**
     * @return int
     */
    public function getTests(): int
    {
        return $this->tests;
    }

    /**
     * @param int $tests
     *
     * @return JUnitSum
     */
    public function addTests(int $tests): JUnitSum
    {
        $this->tests += $tests;
        return $this;
    }

    /**
     * @return int
     */
    public function getFailures(): int
    {
        return $this->failures;
    }

    /**
     * @param int $failures
     *
     * @return JUnitSum
     */
    public function addFailures(int $failures): JUnitSum
    {
        $this->failures += $failures;
        return $this;
    }

    /**
     * @return int
     */
    public function getErrors(): int
    {
        return $this->errors;
    }

    /**
     * @param int $errors
     *
     * @return JUnitSum
     */
    public function addErrors(int $errors): JUnitSum
    {
        $this->errors += $errors;
        return $this;
    }

    /**
     * @return float
     */
    public function getTime(): float
    {
        return $this->time;
    }

    /**
     * @param float $time
     *
     * @return JUnitSum
     */
    public function addTime(float $time): JUnitSum
    {
        $this->time += $time;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSkipped(): ?int
    {
        return $this->skipped;
    }

    /**
     * @param int|null $skipped
     *
     * @return JUnitSum
     */
    public function addSkipped(?int $skipped): JUnitSum
    {
        $this->skipped += $skipped ?? 0;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAssertions(): ?int
    {
        return $this->assertions;
    }

    /**
     * @param int|null $assertions
     *
     * @return JUnitSum
     */
    public function addAssertions(?int $assertions): JUnitSum
    {
        $this->assertions += $assertions ?? 0;
        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return JUnitSum
     */
    public function setCount(int $count): JUnitSum
    {
        $this->count = $count;
        return $this;
    }

}
