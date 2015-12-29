<?php

namespace DayFour;

class AdventCoins
{
    public function calculateNumber($secretKey)
    {
        $counter = 1;
        $hashedValue = md5($secretKey . $counter);
        while(substr($hashedValue, 0, 6) !== '000000') {
            $counter++;
            $hashedValue = md5($secretKey . $counter);
        }
        return $counter;
    }
}
