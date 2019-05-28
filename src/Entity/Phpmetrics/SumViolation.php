<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class SumViolation
{
    /**
     * @var int
     */
    protected $critical = 0;

    /**
     * @var int
     */
    protected $error = 0;

    /**
     * @var int
     */
    protected $warning = 0;

    /**
     * @var int
     */
    protected $information = 0;

    /**
     * @return int
     */
    public function getCritical(): int
    {
        return $this->critical;
    }

    /**
     * @param int $critical
     *
     * @return SumViolation
     */
    public function addCritical(int $critical): SumViolation
    {
        $this->critical += $critical;
        return $this;
    }

    /**
     * @return int
     */
    public function getError(): int
    {
        return $this->error;
    }

    /**
     * @param int $error
     *
     * @return SumViolation
     */
    public function addError(int $error): SumViolation
    {
        $this->error += $error;
        return $this;
    }

    /**
     * @return int
     */
    public function getWarning(): int
    {
        return $this->warning;
    }

    /**
     * @param int $warning
     *
     * @return SumViolation
     */
    public function addWarning(int $warning): SumViolation
    {
        $this->warning += $warning;
        return $this;
    }

    /**
     * @return int
     */
    public function getInformation(): int
    {
        return $this->information;
    }

    /**
     * @param int $information
     *
     * @return SumViolation
     */
    public function addInformation(int $information): SumViolation
    {
        $this->information += $information;
        return $this;
    }
}
