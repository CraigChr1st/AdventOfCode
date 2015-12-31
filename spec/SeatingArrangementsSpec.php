<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SeatingArrangementsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SeatingArrangements');
    }
}
