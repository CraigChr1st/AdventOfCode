<?php

namespace DayThree;

class SantasJourney
{

    private $deliveryMembers = array('santa', 'robosanta');

    public function calculateHousesVisited($directions)
    {
        $visitedHouses = array(
            array(0,0)
        );

        foreach($this->deliveryMembers as $deliveryMember){
            $currentPositions[$deliveryMember] = array(0,0);
        }

        $directions = str_split($directions, 1);
        foreach($directions as $key => $direction){
            $deliveryMember = 'santa';
            if($key % 2 == 0){
                $deliveryMember = 'robosanta';
            }
            $this->manipulatePosition($direction, $currentPositions[$deliveryMember]);
            if($this->houseHasNotBeenVisited($currentPositions[$deliveryMember], $visitedHouses)){
                $visitedHouses[] = $currentPositions[$deliveryMember];
            }
        }
        return count($visitedHouses);
    }

    private function manipulatePosition($direction, &$currentPosition)
    {
        switch ($direction) {
            case '>':
                $currentPosition[0]++;
                break;
            case '<':
                $currentPosition[0]--;
                break;
            case '^':
                $currentPosition[1]++;
                break;
            case 'v':
                $currentPosition[1]--;
                break;
        }
    }

    
    private function houseHasNotBeenVisited($currentPosition, $visitedHouses)
    {
        return !in_array($currentPosition, $visitedHouses);
    }
}
