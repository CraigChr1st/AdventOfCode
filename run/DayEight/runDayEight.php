<?php

use DayEight\Matchsticks;

require_once(__DIR__ . '/../../vendor/autoload.php');

$stringCounter = new Matchsticks();
$stringsToCount = array_map('trim', file(__DIR__ . '/../../resources/DayEight/input.txt'));
foreach ($stringsToCount as $stringToCount) {
    $stringToCount = preg_split("/\s+/", $stringToCount);
    $stringCounter->addString(str_replace(" ", "", $stringToCount));
}

print "The total is : " . $stringCounter->countEncodedStrings() . PHP_EOL;
