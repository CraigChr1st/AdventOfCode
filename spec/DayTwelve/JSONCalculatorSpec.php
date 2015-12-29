<?php

namespace spec\DayTwelve;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class JSONCalculatorSpec
 * @package spec\DayTwelve
 * @mixin \DayTwelve\JSONCalculator
 */
class JSONCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DayTwelve\JSONCalculator');
    }

    function it_calculates_an_empty_string_as_0()
    {
        $this->calculatefromJson('')->shouldReturn(0);
    }

    function it_calculates_a_simple_array_of_123_to_6()
    {
        $this->calculateFromJson('[1,2,3]')->shouldReturn(6);
    }

    function it_calculates_multiple_arrays_of_123_to_12()
    {
        $this->calculateFromJson('[[1,2,3],[1,2,3]]')->shouldReturn(12);
    }

    function it_calculates_an_object_of_123_to_6()
    {
        $this->calculateFromJson('{"a":1,"b":2,"c":3}')->shouldReturn(6);
    }

    function it_calculates_multiple_objects_of_123_to_12()
    {
        $this->calculateFromJson('[{"a":1,"b":2,"c":3},{"a":1,"b":2,"c":3}]')->shouldReturn(12);
    }

    function it_calculates_an_array_and_an_object_of_456_to_30()
    {
        $this->calculateFromJson('[{"a":4,"b":5,"c":6},[4,5,6]]')->shouldReturn(30);
    }

    function it_correctly_calculates_negative_numbers()
    {
        $this->calculateFromJson('{"a":[-1,1]}')->shouldReturn(0);
        $this->calculateFromJson('[-1,{"a":1}]')->shouldReturn(0);
    }

    function it_ignores_any_object_that_contains_red()
    {
        $this->calculateFromJson('{"d":"red","e":[1,2,3,4],"f":5}')->shouldReturn(0);
        $this->calculateFromJson('[1,"red",5]')->shouldReturn(6);
        $this->calculateFromJson('[1,{"c":"red","b":2},3]')->shouldReturn(4);
    }

}
