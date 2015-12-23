<?php

namespace spec\DaySeven;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class BitwiseLogicSpec
 * @package spec\DaySeven
 * @mixin \DaySeven\BitwiseLogic
 */
class BitwiseLogicSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('\DaySeven\BitwiseLogic');
    }

    function it_sets_a_wire_directly()
    {
        $this->processInstruction('123 -> x');
        $this->getWireValue('x')->shouldReturn(123);
    }

    function it_sets_multiple_wires_directly()
    {
        $this->processInstruction('321 -> x');
        $this->processInstruction('789 -> y');
        $this->getWireValue('x')->shouldReturn(321);
        $this->getWireValue('y')->shouldReturn(789);
    }

    function it_executes_bitwise_AND_operator()
    {
        $this->processInstruction('123 -> x');
        $this->processInstruction('456 -> y');
        $this->processInstruction('x AND y -> d');
        $this->getWireValue('d')->shouldReturn(72);
    }

    function it_executes_bitwise_OR_operator()
    {
        $this->processInstruction('123 -> x');
        $this->processInstruction('456 -> y');
        $this->processInstruction('x OR y -> e');
        $this->getWireValue('e')->shouldReturn(507);
    }

    function it_executes_bitwise_LSHIFT_operator()
    {
        $this->processInstruction('123 -> x');
        $this->processInstruction('456 -> y');
        $this->processInstruction('x LSHIFT 2 -> f');
        $this->getWireValue('f')->shouldReturn(492);
    }

    function it_executes_bitwise_RSHIFT_operator()
    {
        $this->processInstruction('123 -> x');
        $this->processInstruction('456 -> y');
        $this->processInstruction('y RSHIFT 2 -> g');
        $this->getWireValue('g')->shouldReturn(114);
    }

    function it_executes_bitwise_NOT_operator()
    {
        $this->processInstruction('123 -> x');
        $this->processInstruction('456 -> y');
        $this->processInstruction('NOT x -> h');
        $this->processInstruction('NOT y -> i');
        $this->getWireValue('h')->shouldReturn(65412);
        $this->getWireValue('i')->shouldReturn(65079);
    }

}
