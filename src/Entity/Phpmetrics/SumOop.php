<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class SumOop
{
    /**
     * @var int
     */
    protected $classes = 0;

    /**
     * @var int
     */
    protected $interface = 0;

    /**
     * @var int
     */
    protected $methods = 0;

    /**
     * @var int
     */
    protected $methodsByClass = 0;

    /**
     * @var float
     */
    protected $lackOfCohesionOfMethods = .0;

    /**
     * @return int
     */
    public function getClasses(): int
    {
        return $this->classes;
    }

    /**
     * @param int $classes
     *
     * @return SumOop
     */
    public function addClasses(int $classes): SumOop
    {
        $this->classes += $classes;
        return $this;
    }

    /**
     * @return int
     */
    public function getInterface(): int
    {
        return $this->interface;
    }

    /**
     * @param int $interface
     *
     * @return SumOop
     */
    public function addInterface(int $interface): SumOop
    {
        $this->interface += $interface;
        return $this;
    }

    /**
     * @return int
     */
    public function getMethods(): int
    {
        return $this->methods;
    }

    /**
     * @param int $methods
     *
     * @return SumOop
     */
    public function addMethods(int $methods): SumOop
    {
        $this->methods += $methods;
        return $this;
    }

    /**
     * @return int
     */
    public function getMethodsByClass(): int
    {
        return $this->methodsByClass;
    }

    /**
     * @param int $methodsByClass
     *
     * @return SumOop
     */
    public function addMethodsByClass(int $methodsByClass): SumOop
    {
        $this->methodsByClass += $methodsByClass;
        return $this;
    }

    /**
     * @return float
     */
    public function getLackOfCohesionOfMethods(): float
    {
        return $this->lackOfCohesionOfMethods;
    }

    /**
     * @param float $lackOfCohesionOfMethods
     *
     * @return SumOop
     */
    public function addLackOfCohesionOfMethods(float $lackOfCohesionOfMethods): SumOop
    {
        $this->lackOfCohesionOfMethods += $lackOfCohesionOfMethods;
        return $this;
    }
}
