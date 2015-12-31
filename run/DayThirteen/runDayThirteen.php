<?php

use DayTen\LookAndSay;
use DayThirteen\SeatingArrangements;

require_once(__DIR__ . '/../../vendor/autoload.php');

$attendeeRules = array_map('trim', file(__DIR__.'/../../resources/DayThirteen/input.txt'));

$seatingArranger = new SeatingArrangements();
foreach ($attendeeRules as $attendeeRule) {
    $seatingArranger->addAttendeeRule($attendeeRule);
}
$seatingArranger->addSelf();
$maximumHappiness = $seatingArranger->calculateHappinessOfTable();

print 'The maximum happiness of the table is : ' . $maximumHappiness . PHP_EOL;
