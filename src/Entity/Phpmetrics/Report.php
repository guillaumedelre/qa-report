<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class Report
{
    /**
     * @var Loc
     */
    protected $loc;

    /**
     * @var Oop
     */
    protected $oop;

    /**
     * @var Coupling
     */
    protected $coupling;

    /**
     * @var Package
     */
    protected $package;

    /**
     * @var Complexity
     */
    protected $complexity;

    /**
     * @var Bug
     */
    protected $bug;

    /**
     * @var Violation
     */
    protected $violation;

    /**
     * @return Loc
     */
    public function getLoc(): Loc
    {
        return $this->loc;
    }

    /**
     * @param Loc $loc
     *
     * @return Report
     */
    public function setLoc(Loc $loc): Report
    {
        $this->loc = $loc;
        return $this;
    }

    /**
     * @return Oop
     */
    public function getOop(): Oop
    {
        return $this->oop;
    }

    /**
     * @param Oop $oop
     *
     * @return Report
     */
    public function setOop(Oop $oop): Report
    {
        $this->oop = $oop;
        return $this;
    }

    /**
     * @return Coupling
     */
    public function getCoupling(): Coupling
    {
        return $this->coupling;
    }

    /**
     * @param Coupling $coupling
     *
     * @return Report
     */
    public function setCoupling(Coupling $coupling): Report
    {
        $this->coupling = $coupling;
        return $this;
    }

    /**
     * @return Package
     */
    public function getPackage(): Package
    {
        return $this->package;
    }

    /**
     * @param Package $package
     *
     * @return Report
     */
    public function setPackage(Package $package): Report
    {
        $this->package = $package;
        return $this;
    }

    /**
     * @return Complexity
     */
    public function getComplexity(): Complexity
    {
        return $this->complexity;
    }

    /**
     * @param Complexity $complexity
     *
     * @return Report
     */
    public function setComplexity(Complexity $complexity): Report
    {
        $this->complexity = $complexity;
        return $this;
    }

    /**
     * @return Bug
     */
    public function getBug(): Bug
    {
        return $this->bug;
    }

    /**
     * @param Bug $bug
     *
     * @return Report
     */
    public function setBug(Bug $bug): Report
    {
        $this->bug = $bug;
        return $this;
    }

    /**
     * @return Violation
     */
    public function getViolation(): Violation
    {
        return $this->violation;
    }

    /**
     * @param Violation $violation
     *
     * @return Report
     */
    public function setViolation(Violation $violation): Report
    {
        $this->violation = $violation;
        return $this;
    }

}
