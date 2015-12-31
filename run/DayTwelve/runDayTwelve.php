<?php

use DayTwelve\JSONCalculator;

require_once(__DIR__ . '/../../vendor/autoload.php');
$jsonNumbers = array_map('trim', file(__DIR__.'/../../resources/DayTwelve/input.txt'));
$jsonCalculator = new JSONCalculator();
$total = $jsonCalculator->calculateFromJson($jsonNumbers[0]);
print "Total in JSON : " . $total . PHP_EOL;