<?php

use DaySix\ChristmasLights;

require_once(__DIR__ . '/../../vendor/autoload.php');

$christmasLights = new ChristmasLights();
$instructions = array_map('trim', file(__DIR__.'/../../resources/DaySix/input.txt'));

foreach($instructions as $instruction){
    $christmasLights->processInstruction($instruction);
}

print $christmasLights->countLightsOn();