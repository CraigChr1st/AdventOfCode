<?php

namespace DayTwo;

class WrappingResourceCalculator
{

    private $boxes = array();

    public function addBox($boxDimensionString)
    {
        $this->boxes[] = $boxDimensionString;
    }

    public function getPaperRequired()
    {
        $totalPaperRequired = 0;
        foreach($this->boxes as $boxDimensions){
            list($length, $width, $height) = explode('x', $boxDimensions);
            $paperRequiredForBox = (2*$length*$width) + (2*$length*$height) + (2*$height*$width);
            $additionalPaperForShortestSide = $this->calculateShortestSide($length, $width, $height);
            $totalPaperRequired += $paperRequiredForBox + $additionalPaperForShortestSide;
        }
        return $totalPaperRequired;
    }

    private function calculateShortestSide($length, $width, $height)
    {
        $dimensionsArray = array($length, $width, $height);
        sort($dimensionsArray);
        $additionalPaperForShortestSide = $dimensionsArray[0] * $dimensionsArray[1];
        return $additionalPaperForShortestSide;
    }

    public function getRibbonRequired()
    {
        $ribbonRequired = 0;
        foreach($this->boxes as $boxDimensions){
            $dimensionsArray = explode('x', $boxDimensions);
            sort($dimensionsArray);
            $ribbonLength = (2*$dimensionsArray[0]) + (2*$dimensionsArray[1]);
            $bowRibbonLength = array_product($dimensionsArray);
            $ribbonRequired += $ribbonLength + $bowRibbonLength;
        }
        return $ribbonRequired;
    }


}
