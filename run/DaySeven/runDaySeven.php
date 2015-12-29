<?php

use DaySeven\BitwiseLogic;

require_once(__DIR__ . '/../../vendor/autoload.php');

$bitwiseInputs = array_map('trim', file(__DIR__.'/../../resources/DaySeven/input.txt'));
$bitwiseLogic = new BitwiseLogic();
foreach($bitwiseInputs as $bitwiseInput){
    $bitwiseLogic->processInstruction($bitwiseInput);
}
$bitwiseLogic->processInstruction('16076 -> b');

print 'Value of wire A : ' . $bitwiseLogic->getWireValue('a') . PHP_EOL;