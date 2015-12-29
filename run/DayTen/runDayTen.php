<?php

use DayTen\LookAndSay;

require_once(__DIR__ . '/../../vendor/autoload.php');

$lookAndSay = new LookAndSay();
$lookValue = '1321131112';
for ($i = 0; $i < 50; $i++) {
    $lookValue = $lookAndSay->convertLookToSay($lookValue);
}

print strlen($lookValue) . PHP_EOL;