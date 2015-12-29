<?php

namespace DayTwelve;

class JSONCalculator
{
    public function calculateFromJson($jsonToCalculate)
    {
        $jsonDecoded = json_decode($jsonToCalculate);
        $total = $this->calculateFromArray($jsonDecoded);
        return $total;
    }

    private function calculateFromArray($numbers)
    {
        $total = 0;
        if (is_array($numbers)) {
            $total += $this->getTotalFromArray($numbers);
        } elseif (is_object($numbers)) {
            $total += $this->getTotalFromObject($numbers);
        } else {
            $total += (int) $numbers;
        }
        return $total;
    }

    private function getTotalFromObject($numberObject)
    {
        $total = 0;
        foreach ($numberObject as $number) {
            if($number === 'red'){
                return 0;
            }
            $total += $this->calculateFromArray($number);
        }
        return $total;
    }

    private function getTotalFromArray($numbers)
    {
        $total = 0;
        foreach ($numbers as $number) {
            $total += $this->calculateFromArray($number);
        }
        return $total;
    }

}

