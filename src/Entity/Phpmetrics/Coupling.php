<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class Coupling
{
    /**
     * @var float
     */
    protected  $averageAfferentCoupling = .0;

    /**
     * @var float
     */
    protected  $averageEfferentCoupling = .0;

    /**
     * @var float
     */
    protected  $averageInstability = .0;

    /**
     * @var float
     */
    protected  $depthOfInheritanceTree = .0;

    /**
     * @return float
     */
    public function getAverageAfferentCoupling(): float
    {
        return $this->averageAfferentCoupling;
    }

    /**
     * @param float $averageAfferentCoupling
     *
     * @return Coupling
     */
    public function setAverageAfferentCoupling(float $averageAfferentCoupling): Coupling
    {
        $this->averageAfferentCoupling = $averageAfferentCoupling;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageEfferentCoupling(): float
    {
        return $this->averageEfferentCoupling;
    }

    /**
     * @param float $averageEfferentCoupling
     *
     * @return Coupling
     */
    public function setAverageEfferentCoupling(float $averageEfferentCoupling): Coupling
    {
        $this->averageEfferentCoupling = $averageEfferentCoupling;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageInstability(): float
    {
        return $this->averageInstability;
    }

    /**
     * @param float $averageInstability
     *
     * @return Coupling
     */
    public function setAverageInstability(float $averageInstability): Coupling
    {
        $this->averageInstability = $averageInstability;
        return $this;
    }

    /**
     * @return float
     */
    public function getDepthOfInheritanceTree(): float
    {
        return $this->depthOfInheritanceTree;
    }

    /**
     * @param float $depthOfInheritanceTree
     *
     * @return Coupling
     */
    public function setDepthOfInheritanceTree(float $depthOfInheritanceTree): Coupling
    {
        $this->depthOfInheritanceTree = $depthOfInheritanceTree;
        return $this;
    }

}
