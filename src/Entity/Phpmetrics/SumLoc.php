<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class SumLoc
{
    /**
     * @var int
     */
    protected $linesOfCode = 0;

    /**
     * @var int
     */
    protected $logicalLinesOfCode = 0;

    /**
     * @var int
     */
    protected $commentLinesOfCode = 0;

    /**
     * @var float
     */
    protected $averageVolume = .0;

    /**
     * @var float
     */
    protected $averageCommentWeight = .0;

    /**
     * @var float
     */
    protected $averageIntelligentContent = .0;

    /**
     * @var int
     */
    protected $logicalLinesOfCodeByClass = 0;

    /**
     * @var int
     */
    protected $logicalLinesOfCodeByMethod = 0;

    /**
     * @return int
     */
    public function getLinesOfCode(): int
    {
        return $this->linesOfCode;
    }

    /**
     * @param int $linesOfCode
     *
     * @return SumLoc
     */
    public function addLinesOfCode(int $linesOfCode): SumLoc
    {
        $this->linesOfCode += $linesOfCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getLogicalLinesOfCode(): int
    {
        return $this->logicalLinesOfCode;
    }

    /**
     * @param int $logicalLinesOfCode
     *
     * @return SumLoc
     */
    public function addLogicalLinesOfCode(int $logicalLinesOfCode): SumLoc
    {
        $this->logicalLinesOfCode += $logicalLinesOfCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getCommentLinesOfCode(): int
    {
        return $this->commentLinesOfCode;
    }

    /**
     * @param int $commentLinesOfCode
     *
     * @return SumLoc
     */
    public function addCommentLinesOfCode(int $commentLinesOfCode): SumLoc
    {
        $this->commentLinesOfCode += $commentLinesOfCode;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageVolume(): float
    {
        return $this->averageVolume;
    }

    /**
     * @param float $averageVolume
     *
     * @return SumLoc
     */
    public function addAverageVolume(float $averageVolume): SumLoc
    {
        $this->averageVolume += $averageVolume;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageCommentWeight(): float
    {
        return $this->averageCommentWeight;
    }

    /**
     * @param float $averageCommentWeight
     *
     * @return SumLoc
     */
    public function addAverageCommentWeight(float $averageCommentWeight): SumLoc
    {
        $this->averageCommentWeight += $averageCommentWeight;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageIntelligentContent(): float
    {
        return $this->averageIntelligentContent;
    }

    /**
     * @param float $averageIntelligentContent
     *
     * @return SumLoc
     */
    public function addAverageIntelligentContent(float $averageIntelligentContent): SumLoc
    {
        $this->averageIntelligentContent += $averageIntelligentContent;
        return $this;
    }

    /**
     * @return int
     */
    public function getLogicalLinesOfCodeByClass(): int
    {
        return $this->logicalLinesOfCodeByClass;
    }

    /**
     * @param int $logicalLinesOfCodeByClass
     *
     * @return SumLoc
     */
    public function addLogicalLinesOfCodeByClass(int $logicalLinesOfCodeByClass): SumLoc
    {
        $this->logicalLinesOfCodeByClass += $logicalLinesOfCodeByClass;
        return $this;
    }

    /**
     * @return int
     */
    public function getLogicalLinesOfCodeByMethod(): int
    {
        return $this->logicalLinesOfCodeByMethod;
    }

    /**
     * @param int $logicalLinesOfCodeByMethod
     *
     * @return SumLoc
     */
    public function addLogicalLinesOfCodeByMethod(int $logicalLinesOfCodeByMethod): SumLoc
    {
        $this->logicalLinesOfCodeByMethod += $logicalLinesOfCodeByMethod;
        return $this;
    }
}
