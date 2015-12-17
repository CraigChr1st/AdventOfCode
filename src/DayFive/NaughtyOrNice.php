<?php

namespace DayFive;

class NaughtyOrNice
{

    private $strings = array();

    public function addString($undeterminedString)
    {
        $this->strings[] = $undeterminedString;
    }

    public function calculateNiceStrings()
    {
        $niceTotal = 0;
        foreach($this->strings as $stringToCheck){
            $vowelCountIsValid = $this->doesTheStringContainARepeatedLetterWithGap($stringToCheck);
            $repeatedLetterExists = $this->doesARepeatedLetterExist($stringToCheck);
            $invalidSequenceExists = $this->doesTheStringContainInvalidSequence($stringToCheck);
            if($vowelCountIsValid && $repeatedLetterExists) {
                $niceTotal++;
            }
        }
        return $niceTotal;
    }

    private function doesTheStringContainARepeatedLetterWithGap($stringToCheck)
    {
        preg_match_all('/(\w).\1/', $stringToCheck, $correctSequences);
        return count($correctSequences[1]) > 0;
    }

    private function doesARepeatedLetterExist($stringToCheck)
    {
        preg_match_all('/(\w{2}).*?\1/', $stringToCheck, $repeatedValues);
        return count($repeatedValues[1]) > 0;
    }

    private function doesTheStringContainInvalidSequence($stringToCheck)
    {
        $invalidSequences = array('ab','cd','pq','xy');
        foreach($invalidSequences as $invalidSequence){
            if(strpos($stringToCheck, $invalidSequence) !== false){
                return true;
            }
        }
        return false;
    }


}
