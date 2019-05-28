<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class PhpmetricsSum
{
    /**
     * @var int
     */
    protected $count = 0;

    /**
     * @var SumLoc
     */
    protected $sumLoc;

    /**
     * @var SumCoupling
     */
    protected $sumCoupling;

    /**
     * @var SumBug
     */
    protected $sumBug;

    /**
     * @var SumComplexity
     */
    protected $sumComplexity;

    /**
     * @var SumOop
     */
    protected $sumOop;

    /**
     * @var SumPackage
     */
    protected $sumPackage;

    /**
     * @var SumViolation
     */
    protected $sumViolation;

    /**
     * @return SumLoc
     */
    public function getSumLoc(): SumLoc
    {
        return $this->sumLoc;
    }

    /**
     * @param SumLoc $sumLoc
     *
     * @return PhpmetricsSum
     */
    public function setSumLoc(SumLoc $sumLoc): PhpmetricsSum
    {
        $this->sumLoc = $sumLoc;
        return $this;
    }

    /**
     * @return SumCoupling
     */
    public function getSumCoupling(): SumCoupling
    {
        return $this->sumCoupling;
    }

    /**
     * @param SumCoupling $sumCoupling
     *
     * @return PhpmetricsSum
     */
    public function setSumCoupling(SumCoupling $sumCoupling): PhpmetricsSum
    {
        $this->sumCoupling = $sumCoupling;
        return $this;
    }

    /**
     * @return SumBug
     */
    public function getSumBug(): SumBug
    {
        return $this->sumBug;
    }

    /**
     * @param SumBug $sumBug
     *
     * @return PhpmetricsSum
     */
    public function setSumBug(SumBug $sumBug): PhpmetricsSum
    {
        $this->sumBug = $sumBug;
        return $this;
    }

    /**
     * @return SumComplexity
     */
    public function getSumComplexity(): SumComplexity
    {
        return $this->sumComplexity;
    }

    /**
     * @param SumComplexity $sumComplexity
     *
     * @return PhpmetricsSum
     */
    public function setSumComplexity(SumComplexity $sumComplexity): PhpmetricsSum
    {
        $this->sumComplexity = $sumComplexity;
        return $this;
    }

    /**
     * @return SumOop
     */
    public function getSumOop(): SumOop
    {
        return $this->sumOop;
    }

    /**
     * @param SumOop $sumOop
     *
     * @return PhpmetricsSum
     */
    public function setSumOop(SumOop $sumOop): PhpmetricsSum
    {
        $this->sumOop = $sumOop;
        return $this;
    }

    /**
     * @return SumViolation
     */
    public function getSumViolation(): SumViolation
    {
        return $this->sumViolation;
    }

    /**
     * @param SumViolation $sumViolation
     *
     * @return PhpmetricsSum
     */
    public function setSumViolation(SumViolation $sumViolation): PhpmetricsSum
    {
        $this->sumViolation = $sumViolation;
        return $this;
    }

    /**
     * @return SumPackage
     */
    public function getSumPackage(): SumPackage
    {
        return $this->sumPackage;
    }

    /**
     * @param SumPackage $sumPackage
     *
     * @return PhpmetricsSum
     */
    public function setSumPackage(SumPackage $sumPackage): PhpmetricsSum
    {
        $this->sumPackage = $sumPackage;
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
     * @return PhpmetricsSum
     */
    public function setCount(int $count): PhpmetricsSum
    {
        $this->count = $count;
        return $this;
    }
}
