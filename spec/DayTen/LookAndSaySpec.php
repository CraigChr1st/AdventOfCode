<?php

namespace spec\DayTen;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LookAndSaySpec extends ObjectBehavior
{

    function it_converts_a_single_digit_to_its_say_value()
    {
        $this->convertLookToSay('1')->shouldReturn('11');
    }

    function it_converts_multiple_digits_to_its_say_value()
    {
        $this->convertLookToSay('11')->shouldReturn('21');
    }

}
