<?php

namespace DayTen;

class LookAndSay
{
    public function convertLookToSay($lookValue)
    {
        $sayValue = '';
        $digits = preg_match_all('/(\d)(?:\1+)?/', $lookValue, $matches);
        foreach ($matches[0] as $match) {
            $sayValue .= strlen($match) . $match[0];
        }
        return $sayValue;
    }
}
