<?php

namespace spec\DayThree;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SantasJourneySpec extends ObjectBehavior
{

    function it_should_return_1_if_no_instructions_are_given()
    {
        $this->calculateHousesVisited("")->shouldReturn(1);
    }

    function it_should_return_2_if_a_single_instruction_is_passed()
    {
        $this->calculateHousesVisited(">")->shouldReturn(2);
    }

    function it_should_return_3_if_travelling_in_a_square()
    {
        $this->calculateHousesVisited(">v<^")->shouldReturn(3);
    }

    function it_should_return_11_if_we_visit_the_same_houses_repeatedly()
    {
        $this->calculateHousesVisited("^v^v^v^v^v")->shouldReturn(11);
    }

    function it_should_return_three_when_visiting_two_locations()
    {
        $this->calculateHousesVisited('^v')->shouldReturn(3);
    }
}
