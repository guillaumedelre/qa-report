<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class SumPackage
{
    /**
     * @var int
     */
    protected $packages = 0;

    /**
     * @var float
     */
    protected $averageClassesPerPackage = .0;

    /**
     * @var float
     */
    protected $averageDistance = .0;

    /**
     * @var float
     */
    protected $averageIncomingClassDependencies = .0;

    /**
     * @var float
     */
    protected $averageOutgoingClassDependencies = .0;

    /**
     * @var float
     */
    protected $averageIncomingPackageDependencies = .0;

    /**
     * @var float
     */
    protected $averageOutgoingPackageDependencies = .0;

    /**
     * @return int
     */
    public function getPackages(): int
    {
        return $this->packages;
    }

    /**
     * @param int $packages
     *
     * @return SumPackage
     */
    public function addPackages(int $packages): SumPackage
    {
        $this->packages += $packages;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageClassesPerPackage(): float
    {
        return $this->averageClassesPerPackage;
    }

    /**
     * @param float $averageClassesPerPackage
     *
     * @return SumPackage
     */
    public function addAverageClassesPerPackage(float $averageClassesPerPackage): SumPackage
    {
        $this->averageClassesPerPackage += $averageClassesPerPackage;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageDistance(): float
    {
        return $this->averageDistance;
    }

    /**
     * @param float $averageDistance
     *
     * @return SumPackage
     */
    public function addAverageDistance(float $averageDistance): SumPackage
    {
        $this->averageDistance += $averageDistance;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageIncomingClassDependencies(): float
    {
        return $this->averageIncomingClassDependencies;
    }

    /**
     * @param float $averageIncomingClassDependencies
     *
     * @return SumPackage
     */
    public function addAverageIncomingClassDependencies(float $averageIncomingClassDependencies): SumPackage
    {
        $this->averageIncomingClassDependencies += $averageIncomingClassDependencies;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageOutgoingClassDependencies(): float
    {
        return $this->averageOutgoingClassDependencies;
    }

    /**
     * @param float $averageOutgoingClassDependencies
     *
     * @return SumPackage
     */
    public function addAverageOutgoingClassDependencies(float $averageOutgoingClassDependencies): SumPackage
    {
        $this->averageOutgoingClassDependencies += $averageOutgoingClassDependencies;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageIncomingPackageDependencies(): float
    {
        return $this->averageIncomingPackageDependencies;
    }

    /**
     * @param float $averageIncomingPackageDependencies
     *
     * @return SumPackage
     */
    public function addAverageIncomingPackageDependencies(float $averageIncomingPackageDependencies): SumPackage
    {
        $this->averageIncomingPackageDependencies += $averageIncomingPackageDependencies;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageOutgoingPackageDependencies(): float
    {
        return $this->averageOutgoingPackageDependencies;
    }

    /**
     * @param float $averageOutgoingPackageDependencies
     *
     * @return SumPackage
     */
    public function addAverageOutgoingPackageDependencies(float $averageOutgoingPackageDependencies): SumPackage
    {
        $this->averageOutgoingPackageDependencies += $averageOutgoingPackageDependencies;
        return $this;
    }
}
