<?php

use DayEleven\PasswordChecker;

require_once(__DIR__ . '/../../vendor/autoload.php');

$originalPassword = 'cqjxxyzz';
$originalPassword++;
$passwordChecker = new PasswordChecker();
while (!$passwordChecker->validatePassword($originalPassword)) {
    $originalPassword++;
}


print "Next valid password for santa is : " . $originalPassword . PHP_EOL;
