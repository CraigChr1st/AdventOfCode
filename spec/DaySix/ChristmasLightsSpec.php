<?php

namespace spec\DaySix;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class ChristmasLightsSpec
 * @package spec\DaySix
 * @mixin \DaySix\ChristmasLights
 */
class ChristmasLightsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DaySix\ChristmasLights');
    }

    function it_should_have_no_lights_turned_on_to_begin_with()
    {
        $this->countLightsOn()->shouldReturn(0);
    }

    function it_should_turn_on_a_single_light()
    {
        $this->handleLights(array(0,0),array(0,0));
        $this->countLightsOn()->shouldReturn(1);
    }

    function it_should_turn_on_10_lights()
    {
        $this->handleLights(array(0,0),array(0,9));
        $this->countLightsOn()->shouldReturn(10);
    }

    function it_should_turn_on_a_full_column()
    {
        $this->handleLights(array(0,0),array(0,999));
        $this->countLightsOn()->shouldReturn(1000);
    }

    function it_should_turn_on_a_full_row()
    {
        $this->handleLights(array(0,0),array(999,0));
        $this->countLightsOn()->shouldReturn(1000);
    }

    function it_toggles_off_nine_lights()
    {
        $this->handleLights(array(0,0), array(5,5));
        $this->handleLights(array(0,0), array(2,2), 'toggle');
        $this->countLightsOn()->shouldReturn(27);
    }

    function it_toggles_on_36_lights()
    {
        $this->handleLights(array(0,0), array(5,5));
        $this->countLightsOn()->shouldReturn(36);
    }

    function it_turns_off_64_lights()
    {
        $this->handleLights(array(0,0), array(9,9));
        $this->handleLights(array(0,0),array(7,7), 'turn off');
        $this->countLightsOn()->shouldReturn(36);
    }

    function it_processes_a_text_on_instruction()
    {
        $this->processInstruction('turn on 0,0 through 999,999');
        $this->countLightsOn()->shouldReturn(1000000);
    }

}
