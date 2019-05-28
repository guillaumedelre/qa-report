<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\Phpmetrics;

class Loc
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
     * @return Loc
     */
    public function setLinesOfCode(int $linesOfCode): Loc
    {
        $this->linesOfCode = $linesOfCode;
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
     * @return Loc
     */
    public function setLogicalLinesOfCode(int $logicalLinesOfCode): Loc
    {
        $this->logicalLinesOfCode = $logicalLinesOfCode;
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
     * @return Loc
     */
    public function setCommentLinesOfCode(int $commentLinesOfCode): Loc
    {
        $this->commentLinesOfCode = $commentLinesOfCode;
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
     * @return Loc
     */
    public function setAverageVolume(float $averageVolume): Loc
    {
        $this->averageVolume = $averageVolume;
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
     * @return Loc
     */
    public function setAverageCommentWeight(float $averageCommentWeight): Loc
    {
        $this->averageCommentWeight = $averageCommentWeight;
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
     * @return Loc
     */
    public function setAverageIntelligentContent(float $averageIntelligentContent): Loc
    {
        $this->averageIntelligentContent = $averageIntelligentContent;
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
     * @return Loc
     */
    public function setLogicalLinesOfCodeByClass(int $logicalLinesOfCodeByClass): Loc
    {
        $this->logicalLinesOfCodeByClass = $logicalLinesOfCodeByClass;
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
     * @return Loc
     */
    public function setLogicalLinesOfCodeByMethod(int $logicalLinesOfCodeByMethod): Loc
    {
        $this->logicalLinesOfCodeByMethod = $logicalLinesOfCodeByMethod;
        return $this;
    }
}
