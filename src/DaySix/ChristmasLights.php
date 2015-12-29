<?php

namespace DaySix;

class ChristmasLights
{
    private $lights;

    const LIGHTS_X = 1000;
    const LIGHTS_Y = 1000;

    public function __construct()
    {
        $this->lights = new \SplFixedArray(self::LIGHTS_X * self::LIGHTS_Y);
    }

    public function countLightsOn()
    {
        $lights = 0;
        foreach($this->lights as $light){
            $lights+= $light;
        }
        return $lights;
    }

    public function handleLights($startPosition,$endPosition, $state = 'turn on')
    {
        for($x = $startPosition[0]; $x <= $endPosition[0]; $x++){
            for($y = $startPosition[1]; $y <= $endPosition[1]; $y++){
                $indexToSwitch = $y + (self::LIGHTS_X * $x);
                switch($state){
                    case 'turn on':
                        $this->lights[$indexToSwitch] = $this->lights[$indexToSwitch]+1;
                        break;
                    case 'turn off':
                        if($this->lights[$indexToSwitch] > 0) {
                            $this->lights[$indexToSwitch] = $this->lights[$indexToSwitch] - 1;
                        }
                        break;
                    case 'toggle':
                        $this->lights[$indexToSwitch] = $this->lights[$indexToSwitch] + 2;
                        break;
                }
            }
        }
    }

    public function processInstruction($instruction)
    {
        preg_match_all('/(\D+)(\d+),(\d+)\D+(\d+),(\d+)/', $instruction, $matches);
        $type = trim($matches[1][0]);
        $startPosition = array(
            intval($matches[2][0]),
            intval($matches[3][0])
        );
        $endPosition = array(
            intval($matches[4][0]),
            intval($matches[5][0])
        );
        $this->handleLights($startPosition, $endPosition, $type);
    }
}
