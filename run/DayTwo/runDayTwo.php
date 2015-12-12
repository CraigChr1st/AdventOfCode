<?php

use DayTwo\WrappingResourceCalculator;

require_once(__DIR__ . '/../../vendor/autoload.php');

$wrappingResourceCalculator = new WrappingResourceCalculator();
$boxDimensionsList = array_map('trim', file(__DIR__.'/../../resources/DayTwo/boxDimensions.txt'));

foreach($boxDimensionsList as $boxDimensions){
    $wrappingResourceCalculator->addBox($boxDimensions);
}

print $wrappingResourceCalculator->getRibbonRequired();