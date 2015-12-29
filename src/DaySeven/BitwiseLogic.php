<?php

namespace DaySeven;

class BitwiseLogic
{
    private $instructions = array();

    public function processInstruction($instruction)
    {
        list($instruction, $wire) = explode(' -> ', $instruction);
        $this->instructions[$wire] = trim($instruction);
    }

    public function getWireValue($wireIdentifier)
    {
        if(!array_key_exists($wireIdentifier, $this->instructions)){
            return $wireIdentifier;
        }
        if(!is_numeric($this->instructions[$wireIdentifier])){
            if($this->isANotInstruction($wireIdentifier)){
                $newWireValue = $this->executeNotOperator($wireIdentifier);
            } else {
                $newWireValue = $this->executeUniformBitwiseOperand($wireIdentifier);
            }
            $this->instructions[$wireIdentifier] = (int)$newWireValue;
        }


        return (int)$this->instructions[$wireIdentifier];
    }

    private function isANotInstruction($wireIdentifier)
    {
        return strpos($this->instructions[$wireIdentifier], 'NOT') !== false;
    }

    private function executeNotOperator($wireIdentifier)
    {
        preg_match_all('/(\w+)\s(\w+)/', $this->instructions[$wireIdentifier], $instructionParts);
        $wireValue = $this->getWireValue($instructionParts[2][0]);
        $newWireValue = 65535 - $wireValue;
        return $newWireValue;
    }

    private function executeUniformBitwiseOperand($wireIdentifier)
    {
        if(array_key_exists($this->instructions[$wireIdentifier], $this->instructions)){
            return $this->getWireValue($this->instructions[$wireIdentifier]);
        }
        preg_match_all('/(\w+)\s(\w+)\s?(\w+)?/', $this->instructions[$wireIdentifier], $instructionParts);
        if (count($instructionParts) == 4) {
            $firstWireValue = $this->getWireValue($instructionParts[1][0]);
            $secondWireValue = $this->getWireValue($instructionParts[3][0]);
            switch (trim($instructionParts[2][0])) {
                case 'AND':
                    $newWireValue = $firstWireValue & $secondWireValue;
                    break;
                case 'OR':
                    $newWireValue = $firstWireValue | $secondWireValue;
                    break;
                case 'LSHIFT':
                    $newWireValue = $firstWireValue << $secondWireValue;
                    break;
                case 'RSHIFT':
                    $newWireValue = $firstWireValue >> $secondWireValue;
                    break;
            }
        }
        return $newWireValue;
    }
}
