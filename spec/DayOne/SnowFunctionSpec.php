<?php

namespace spec\DayOne;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SnowFunctionSpec extends ObjectBehavior
{
    function it_should_return_floor_zero_with_no_instructions_given()
    {
        $this->getFloorToVisit("")->shouldReturn(0);
    }

    function it_should_return_floor_one_with_a_single_opening_parenthesis_as_the_instruction()
    {
        $this->getFloorToVisit("(")->shouldReturn(1);
    }

    function it_should_return_floor_minus_one_with_a_single_closing_parenthesis_as_the_instruction()
    {
        $this->getFloorToVisit(")")->shouldReturn(-1);
    }

    function it_should_calculate_floor_three_for_three_opening_parentheses()
    {
        $this->getFloorToVisit("(((")->shouldReturn(3);
    }

    function it_should_return_negative_three()
    {
        $this->getFloorToVisit(")())())")->shouldReturn(-3);
    }

    function it_should_calculate_that_he_enters_the_basement_on_instruction_one()
    {
        $this->findBasementEntry(")")->shouldReturn(1);
    }

    function it_should_calculate_that_he_enters_the_basement_on_instruction_three()
    {
        $this->findBasementEntry("())")->shouldReturn(3);
    }

    function it_should_calculate_that_he_enters_the_basement_on_instruction_seven()
    {
        $this->findBasementEntry("(()(())))(()))")->shouldReturn(9);
    }

}
