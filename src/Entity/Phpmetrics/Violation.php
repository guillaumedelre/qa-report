<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class Violation
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
     * @return Violation
     */
    public function setCritical(int $critical): Violation
    {
        $this->critical = $critical;
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
     * @return Violation
     */
    public function setError(int $error): Violation
    {
        $this->error = $error;
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
     * @return Violation
     */
    public function setWarning(int $warning): Violation
    {
        $this->warning = $warning;
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
     * @return Violation
     */
    public function setInformation(int $information): Violation
    {
        $this->information = $information;
        return $this;
    }
}
