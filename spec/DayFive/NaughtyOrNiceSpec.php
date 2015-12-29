<?php

namespace spec\DayFive;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NaughtyOrNiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('\DayFive\NaughtyOrNice');
    }

    function it_should_return_0_nice_strings_if_the_string_doesnt_contain_three_vowels()
    {
        $this->addString('abcdefgh');
        $this->calculateNiceStrings()->shouldReturn(0);
    }

    function it_should_return_0_nice_strings_if_the_string_doesnt_contain_2_repeated_letters()
    {
        $this->addString('ieodomkazucvgmuy');
        $this->calculateNiceStrings()->shouldReturn(0);
    }

    function it_should_return_0_nice_strings_if_the_string_doesnt_contain_ab_cd_pq_xy()
    {
        $this->addString('uurcxstgmygtbstg');
        $this->calculateNiceStrings()->shouldReturn(0);
    }

    function it_should_return_nice_if_the_string_meets_all_three_nice_requirements()
    {
        $this->addString('qjhvhtzxzqqjkmpb');
        $this->calculateNiceStrings()->shouldReturn(1);
    }
}
