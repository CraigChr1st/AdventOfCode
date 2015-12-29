<?php

namespace spec\DayFour;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AdventCoinsSpec extends ObjectBehavior
{
    function it_should_return_609043_if_the_secret_key_is_abcdef()
    {
        $this->calculateNumber('abcdef')->shouldReturn(609043);
    }

    function it_should_return_1048970_if_the_secrety_key_is_pqrstuv()
    {
        $this->calculateNumber('pqrstuv')->shouldReturn(1048970);
    }

    function it_should_return_the_right_value()
    {
        $this->calculateNumber('yzbqklnj')->shouldReturn('');
    }
}
