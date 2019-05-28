<?php
declare(strict_types=1);

namespace Agilicode\QAT\Factory;

use Agilicode\QAT\Entity\Phpmetrics\Bug;
use Agilicode\QAT\Entity\Phpmetrics\Complexity;
use Agilicode\QAT\Entity\Phpmetrics\Coupling;
use Agilicode\QAT\Entity\Phpmetrics\Loc;
use Agilicode\QAT\Entity\Phpmetrics\Oop;
use Agilicode\QAT\Entity\Phpmetrics\Package;
use Agilicode\QAT\Entity\Phpmetrics\PhpmetricLogFile;
use Agilicode\QAT\Entity\Phpmetrics\PhpmetricsSum;
use Agilicode\QAT\Entity\Phpmetrics\Report;
use Agilicode\QAT\Entity\Phpmetrics\SumBug;
use Agilicode\QAT\Entity\Phpmetrics\SumComplexity;
use Agilicode\QAT\Entity\Phpmetrics\SumCoupling;
use Agilicode\QAT\Entity\Phpmetrics\SumLoc;
use Agilicode\QAT\Entity\Phpmetrics\SumOop;
use Agilicode\QAT\Entity\Phpmetrics\SumPackage;
use Agilicode\QAT\Entity\Phpmetrics\SumViolation;
use Agilicode\QAT\Entity\Phpmetrics\Violation;
use Agilicode\QAT\Interfaces\ArtifactInterface;

class PhpmetricsSumFactory
{
    /**
     * @param ArtifactInterface[] $artifacts
     *
     * @return PhpmetricsSum
     */
    public static function create(array $artifacts): PhpmetricsSum
    {
        $metric = new PhpmetricsSum();
        $sumOop = new SumOop();
        $sumBug = new SumBug();
        $sumPackage = new SumPackage();
        $sumViolation = new SumViolation();
        $sumComplexity = new SumComplexity();
        $sumLoc = new SumLoc();
        $sumCoupling = new SumCoupling();
        $count= 0;

        /** @var Report $artifact */
        foreach ($artifacts as $artifact) {
            if (!$artifact instanceof PhpmetricLogFile || empty($artifact->getReport())) {
                continue;
            }

            /** @var Report $report */
            $report = $artifact->getReport();

            self::sumLoc($report->getLoc(), $sumLoc);
            self::sumCoupling($report->getCoupling(), $sumCoupling);
            self::sumBug($report->getBug(), $sumBug);
            self::sumComplexity($report->getComplexity(), $sumComplexity);
            self::sumOop($report->getOop(), $sumOop);
            self::sumPackage($report->getPackage(), $sumPackage);
            self::sumViolation($report->getViolation(), $sumViolation);
            $count++;
        }

        $metric->setSumLoc($sumLoc);
        $metric->setSumCoupling($sumCoupling);
        $metric->setSumBug($sumBug);
        $metric->setSumComplexity($sumComplexity);
        $metric->setSumOop($sumOop);
        $metric->setSumPackage($sumPackage);
        $metric->setSumViolation($sumViolation);
        $metric->setCount($count);
        return $metric;
    }

    /**
     * @param Oop    $oop
     * @param SumOop $object
     *
     * @return SumOop
     */
    private static function sumOop(Oop $oop, SumOop &$object)
    {
        $object->addClasses($oop->getClasses());
        $object->addMethods($oop->getMethods());
        $object->addInterface($oop->getInterface());
        $object->addMethodsByClass($oop->getMethodsByClass());
        $object->addLackOfCohesionOfMethods($oop->getLackOfCohesionOfMethods());
    }

    /**
     * @param Bug    $bug
     * @param SumBug $object
     *
     * @return SumBug
     */
    private static function sumBug(Bug $bug, SumBug &$object)
    {
        $object->addAverageBugsByClass($bug->getAverageBugsByClass());
        $object->addAverageDefectsByClass($bug->getAverageDefectsByClass());
    }

    /**
     * @param Package    $package
     * @param SumPackage $object
     */
    private static function sumPackage(Package $package, SumPackage &$object)
    {
        $object->addPackages($package->getPackages());
        $object->addAverageDistance($package->getAverageDistance());
        $object->addAverageClassesPerPackage($package->getAverageClassesPerPackage());
        $object->addAverageIncomingClassDependencies($package->getAverageIncomingClassDependencies());
        $object->addAverageOutgoingClassDependencies($package->getAverageOutgoingClassDependencies());
        $object->addAverageIncomingPackageDependencies($package->getAverageIncomingPackageDependencies());
        $object->addAverageOutgoingPackageDependencies($package->getAverageOutgoingPackageDependencies());
    }

    /**
     * @param Violation    $violation
     * @param SumViolation $object
     */
    private static function sumViolation(Violation $violation, SumViolation &$object)
    {
        $object->addCritical($violation->getCritical());
        $object->addError($violation->getError());
        $object->addWarning($violation->getWarning());
        $object->addInformation($violation->getInformation());
    }

    /**
     * @param Complexity    $complexity
     * @param SumComplexity $object
     */
    private static function sumComplexity(Complexity $complexity, SumComplexity &$object)
    {
        $object->addAverageDifficulty($complexity->getAverageDifficulty());
        $object->addAverageRelativeSystemComplexity($complexity->getAverageRelativeSystemComplexity());
        $object->addAverageWeightedmethodCountByClass($complexity->getAverageWeightedmethodCountByClass());
        $object->addAverageCyclomaticComplexityByClass($complexity->getAverageCyclomaticComplexityByClass());
    }

    /**
     * @param Loc    $loc
     * @param SumLoc $object
     */
    private static function sumLoc(Loc $loc, SumLoc &$object)
    {
        $object->addLinesOfCode($loc->getLinesOfCode());
        $object->addCommentLinesOfCode($loc->getCommentLinesOfCode());
        $object->addLogicalLinesOfCode($loc->getLogicalLinesOfCode());
        $object->addLogicalLinesOfCodeByClass($loc->getLogicalLinesOfCodeByClass());
        $object->addLogicalLinesOfCodeByMethod($loc->getLogicalLinesOfCodeByMethod());
        $object->addAverageVolume($loc->getAverageVolume());
        $object->addAverageCommentWeight($loc->getAverageCommentWeight());
        $object->addAverageIntelligentContent($loc->getAverageIntelligentContent());
    }

    /**
     * @param Coupling    $coupling
     * @param SumCoupling $object
     */
    private static function sumCoupling(Coupling $coupling, SumCoupling &$object)
    {
        $object->addAverageAfferentCoupling($coupling->getAverageAfferentCoupling());
        $object->addAverageEfferentCoupling($coupling->getAverageEfferentCoupling());
        $object->addAverageInstability($coupling->getAverageInstability());
        $object->addDepthOfInheritanceTree($coupling->getDepthOfInheritanceTree());
    }
}
