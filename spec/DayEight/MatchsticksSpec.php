<?php

namespace spec\DayEight;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class MatchsticksSpec
 * @package spec\DayEight
 * @mixin \DayEight\Matchsticks
 */
class MatchsticksSpec extends ObjectBehavior
{

    function it_counts_an_empty_string_as_2_characters()
    {
        $this->addString('""');
        $this->countCharactersInStrings()->shouldReturn(2);
    }

    function it_counts_abc_as_5_characters()
    {
        $this->addString('"abc"');
        $this->countCharactersInStrings()->shouldReturn(2);
    }

    function it_counts_a_double_quotes_character_in_the_middle_of_the_string()
    {
        $this->addString('"aaa\"aaa"');
        $this->countCharactersInStrings()->shouldReturn(3);
    }

    function it_counts_escaped_hex_codes_as_a_single_character()
    {
        $this->addString('"\x27"');
        $this->countCharactersInStrings()->shouldReturn(5);
    }

    function it_escapes_and_counts_escaped_slashes_correctly()
    {
        $this->addString('"\\\\"');
        $this->countCharactersInStrings()->shouldReturn(3);
    }

    function it_passes_the_test_criteria_on_advent_of_code()
    {
        $this->addString('""');
        $this->addString('"abc"');
        $this->addString('"aaa\"aaa"');
        $this->addString('"\\x27"');
        $this->countCharactersInStrings()->shouldReturn(12);
    }

}
