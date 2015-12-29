<?php

namespace spec\DayTwo;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WrappingResourceCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DayTwo\WrappingResourceCalculator');
    }

    function it_should_return_2_square_meters_of_wrapping_paper_if_all_dimensions_are_1()
    {
        $this->addBox('1x1x1');
        $this->getPaperRequired()->shouldReturn(7);
    }

    function it_should_return_58_square_meters_of_wrapping_paper_if_dimensions_are_2x3x4()
    {
        $this->addBox('2x3x4');
        $this->getPaperRequired()->shouldReturn(58);
    }

    function it_should_return_43_square_meters_of_wrapping_paper_if_dimensions_are_1x1x10()
    {
        $this->addBox('1x1x10');
        $this->getPaperRequired()->shouldReturn(43);
    }

    function it_should_calculate_the_required_amount_of_paper_for_both_boxes_as_101()
    {
        $this->addBox('1x1x10');
        $this->addBox('2x3x4');
        $this->getPaperRequired()->shouldReturn(101);
    }

    function it_should_calculate_ribbon_required_as_34_for_dimensions_2x3x4()
    {
        $this->addBox('2x3x4');
        $this->getRibbonRequired()->shouldReturn(34);
    }

    function it_should_calculate_ribbon_required_as_14_for_dimensions_1x1x10()
    {
        $this->addBox('1x1x10');
        $this->getRibbonRequired()->shouldReturn(14);
    }

    function it_should_calculate_ribbon_required_for_multiple_boxes_as_48()
    {
        $this->addBox('1x1x10');
        $this->addBox('2x3x4');
        $this->getRibbonRequired()->shouldReturn(48);
    }
}
