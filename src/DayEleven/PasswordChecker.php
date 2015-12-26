<?php

namespace DayEleven;

class PasswordChecker
{

    public function validatePassword($password)
    {
        return $this->passwordHasConsecutiveCharacters($password)
            && $this->passwordIsFreeFromInvalidCharacters($password)
            && $this->passwordContainsTwoPairs($password);
    }

    private function getConsecutiveCharacters($passwordCharacter)
    {
        $nextCharacter = $passwordCharacter;
        $nextCharacter++;
        $nextCharacterButOne = $nextCharacter;
        $nextCharacterButOne++;
        return array($nextCharacter, $nextCharacterButOne);
    }

    private function passwordHasConsecutiveCharacters($password)
    {
        $valid = false;
        $passwordCharacters = str_split($password, 1);
        for ($index = 0; isset($passwordCharacters[$index + 2]); $index++) {
            $passwordCharacter = $passwordCharacters[$index];
            $passwordCharactersToMatch = array($passwordCharacters[$index + 1], $passwordCharacters[$index + 2]);
            $charactersRequired = $this->getConsecutiveCharacters($passwordCharacter);
            if ($passwordCharactersToMatch == $charactersRequired) {
                $valid = true;
            }
        }
        return $valid;
    }

    private function passwordContainsTwoPairs($password)
    {
        preg_match_all('/(\w)\1/', $password, $matches);
        if(count($matches[0]) >= 2){
            return true;
        }
    }

    private function passwordIsFreeFromInvalidCharacters($password)
    {
        foreach(array('i','o','l') as $invalidCharacter){
            if(strpos($password, $invalidCharacter) !== false){
                return false;
            }
        }
        return true;
    }


}
