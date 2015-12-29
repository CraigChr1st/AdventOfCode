<?php

namespace DayOne;

class SnowFunction
{
    public function getFloorToVisit($floorInstructions)
    {
        $floorsToGoUp = substr_count($floorInstructions, '(');
        $floorsToGoDown = substr_count($floorInstructions, ')');
        return $floorsToGoUp - $floorsToGoDown;
    }

    public function findBasementEntry($floorInstructions)
    {
        $characterValue = array(
            '(' => 1,
            ')' => -1
        );
        $currentFloor = 0;
        for($i = 0; $i < strlen($floorInstructions); $i++){
            $instruction = $floorInstructions[$i];
            $currentFloor += $characterValue[$instruction];
            if($currentFloor < 0){
                return ++$i;
            }
        }
    }
}
