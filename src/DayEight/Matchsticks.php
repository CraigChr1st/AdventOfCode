<?php

namespace DayEight;

class Matchsticks
{

    private $strings = [];

    public function addString($string)
    {
        $this->strings[] = $string;
    }

    public function countCharactersInStrings()
    {
        $rawLength = $normalisedLength = 0;
        $countStrings = function($item) use (&$rawLength, &$normalisedLength) {
            $normalisedString = substr($item[0], 1, -1);
            $normalisedString = str_replace(['\\\\','\\"'],'-', $normalisedString);
            $normalisedString = preg_replace('/\\\x[a-f0-9]{2}/i', '-', $normalisedString);

            $rawLength += strlen($item[0]);
            $normalisedLength += strlen($normalisedString);


        };
        array_map($countStrings, $this->strings);
        return $rawLength - $normalisedLength;
    }

    public function countEncodedStrings()
    {
        $rawLength = $normalisedLength = 0;

        $countStrings = function($item) use (&$rawLength, &$normalisedLength) {
            $normalisedString = str_replace(['\\', '"'], ['\\\\', '\\"'], $item[0]);
            $normalisedString = '"' . $normalisedString . '"';
            $rawLength += strlen($item[0]);
            $normalisedLength += strlen($normalisedString);
        };
        array_map($countStrings, $this->strings);
        return $normalisedLength - $rawLength;
    }
}
