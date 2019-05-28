<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class SumCoupling
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
     * @return SumCoupling
     */
    public function addAverageAfferentCoupling(float $averageAfferentCoupling): SumCoupling
    {
        $this->averageAfferentCoupling += $averageAfferentCoupling;
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
     * @return SumCoupling
     */
    public function addAverageEfferentCoupling(float $averageEfferentCoupling): SumCoupling
    {
        $this->averageEfferentCoupling += $averageEfferentCoupling;
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
     * @return SumCoupling
     */
    public function addAverageInstability(float $averageInstability): SumCoupling
    {
        $this->averageInstability += $averageInstability;
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
     * @return SumCoupling
     */
    public function addDepthOfInheritanceTree(float $depthOfInheritanceTree): SumCoupling
    {
        $this->depthOfInheritanceTree += $depthOfInheritanceTree;
        return $this;
    }

}
