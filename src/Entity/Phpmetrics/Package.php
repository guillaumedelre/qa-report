<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class Package
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
     * @return int
     */
    public function getPackages(): int
    {
        return $this->packages;
    }

    /**
     * @param int $packages
     *
     * @return Package
     */
    public function setPackages(int $packages): Package
    {
        $this->packages = $packages;
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
     * @return Package
     */
    public function setAverageClassesPerPackage(float $averageClassesPerPackage): Package
    {
        $this->averageClassesPerPackage = $averageClassesPerPackage;
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
     * @return Package
     */
    public function setAverageDistance(float $averageDistance): Package
    {
        $this->averageDistance = $averageDistance;
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
     * @return Package
     */
    public function setAverageIncomingClassDependencies(float $averageIncomingClassDependencies): Package
    {
        $this->averageIncomingClassDependencies = $averageIncomingClassDependencies;
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
     * @return Package
     */
    public function setAverageOutgoingClassDependencies(float $averageOutgoingClassDependencies): Package
    {
        $this->averageOutgoingClassDependencies = $averageOutgoingClassDependencies;
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
     * @return Package
     */
    public function setAverageIncomingPackageDependencies(float $averageIncomingPackageDependencies): Package
    {
        $this->averageIncomingPackageDependencies = $averageIncomingPackageDependencies;
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
     * @return Package
     */
    public function setAverageOutgoingPackageDependencies(float $averageOutgoingPackageDependencies): Package
    {
        $this->averageOutgoingPackageDependencies = $averageOutgoingPackageDependencies;
        return $this;
    }
}
