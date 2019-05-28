<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class Oop
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
     * @return Oop
     */
    public function setClasses(int $classes): Oop
    {
        $this->classes = $classes;
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
     * @return Oop
     */
    public function setInterface(int $interface): Oop
    {
        $this->interface = $interface;
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
     * @return Oop
     */
    public function setMethods(int $methods): Oop
    {
        $this->methods = $methods;
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
     * @return Oop
     */
    public function setMethodsByClass(int $methodsByClass): Oop
    {
        $this->methodsByClass = $methodsByClass;
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
     * @return Oop
     */
    public function setLackOfCohesionOfMethods(float $lackOfCohesionOfMethods): Oop
    {
        $this->lackOfCohesionOfMethods = $lackOfCohesionOfMethods;
        return $this;
    }
}
