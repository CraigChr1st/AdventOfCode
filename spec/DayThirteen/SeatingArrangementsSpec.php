<?php

namespace spec\DayThirteen;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SeatingArrangementsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DayThirteen\SeatingArrangements');
    }

    function it_has_a_change_in_happiness_of_zero_for_an_empty_table()
    {
        $this->calculateHappinessOfTable()->shouldReturn(0);
    }

    function it_calculates_the_change_in_happiness_as_the_sum_of_values_for_three_people(){
        $this->addAttendeeRule('Craig would gain 50 happiness units by sitting next to HotFemaleModel');
        $this->addAttendeeRule('HotFemaleModel would gain 200 happiness units by sitting next to Craig');
        $this->addAttendeeRule('HotFemaleModel would lose 100 happiness units by sitting next to Oly');
        $this->addAttendeeRule('Craig would lose 10 happiness units by sitting next to Oly');
        $this->addAttendeeRule('Oly would gain 1000 happiness units by sitting next to Craig');
        $this->addAttendeeRule('Oly would gain 10000 happiness units by sitting next to HotFemaleModel');
        $this->calculateHappinessOfTable()->shouldReturn(11140);
    }

}
