<?php

use DayFive\NaughtyOrNice;

require_once(__DIR__ . '/../../vendor/autoload.php');

$untestedStrings = array_map('trim', file(__DIR__ . '/../../resources/DayFive/input.txt'));
$naughtyOrNiceCalculator = new NaughtyOrNice();
foreach($untestedStrings as $string){
    $naughtyOrNiceCalculator->addString($string);
}

print $naughtyOrNiceCalculator->calculateNiceStrings();
