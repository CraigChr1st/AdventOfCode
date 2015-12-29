<?php

namespace spec\DayEleven;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class PasswordCheckerSpec
 * @package spec\DayEleven
 * @mixin \DayEleven\PasswordChecker
 */
class PasswordCheckerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DayEleven\PasswordChecker');
    }

    function it_accepts_passwords_with_consecutive_letter_sequence()
    {
        $this->validatePassword('asjdhakoj')->shouldReturn(false);
        $this->validatePassword('aabcc')->shouldReturn(true);
    }

    function it_rejects_passwords_with_the_characters_i_o_l()
    {
        $this->validatePassword('itsapasswdabcaa')->shouldReturn(false);
        $this->validatePassword('passwdabcaajj')->shouldReturn(true);
    }

    function it_accepts_passwords_that_contain_two_non_overlapping_pairs_of_characters()
    {
        $this->validatePassword('smethngabc')->shouldReturn(false);
        $this->validatePassword('smmetthngabc')->shouldReturn(true);
    }
}
