<?php

namespace DayThirteen;

class SeatingArrangements
{

    private $attendeeRules;

    private $seatingPlans = array();

    public function calculateHappinessOfTable()
    {
        $tableHappiness = 0;
        if (is_array($this->attendeeRules)) {
            $this->getAllSeatingArrangements(array_keys($this->attendeeRules), array());
            $tableHappiness = $this->getSeatingArrangementBestHappinessScore();
        }
        return $tableHappiness;
    }

    public function addSelf()
    {
        foreach(array_keys($this->attendeeRules) as $attendee) {
            $this->addAttendeeRule("{$attendee} would gain 0 happiness units by sitting next to Myself");
            $this->addAttendeeRule("Myself would gain 0 happiness units by sitting next to {$attendee}");
        }

    }

    private function getSeatingArrangementBestHappinessScore()
    {
        $happinessScore = 0;
        foreach ($this->seatingPlans as $key => $seatingPlan) {
            $newHappinessScore = 0;
            foreach ($seatingPlan as $seatPosition => $seatedPerson) {
                $leftPartner = $this->getLeftPartner($seatPosition, $seatingPlan);
                $rightPartner = $this->getRightPartner($seatPosition, $seatingPlan);
                $newHappinessScore += $this->attendeeRules[$seatedPerson][$leftPartner];
                $newHappinessScore += $this->attendeeRules[$seatedPerson][$rightPartner];
            }
            if ($newHappinessScore > $happinessScore) {
                $happinessScore = $newHappinessScore;
            }
        }
        return $happinessScore;
    }

    private function getAllSeatingArrangements($standingPeople, $seatingPlan)
    {
        if (empty($standingPeople)) {
            $this->seatingPlans[] = $seatingPlan;
        } else {
            for ($i = count($standingPeople) - 1; $i >= 0; --$i) {
                $standingPeopleClone = $standingPeople;
                $seatingPlanClone = $seatingPlan;
                list($newSitter) = array_splice($standingPeopleClone, $i, 1);
                array_unshift($seatingPlanClone, $newSitter);
                $this->getAllSeatingArrangements($standingPeopleClone, $seatingPlanClone);
            }
        }
    }

    public function addAttendeeRule($attendeeRule)
    {
        $ruleParts = explode(' ', $attendeeRule);
        $ruleType = $ruleParts[2];
        $attendee = $ruleParts[0];
        $seatingPartner = trim($ruleParts[count($ruleParts) - 1], '.');
        $value = $ruleParts[3];
        if ($ruleType == 'lose') {
            $value *= -1;
        }
        $this->attendeeRules[$attendee][$seatingPartner] = $value;
    }

    /**
     * @param $seatPosition
     * @param $seatingPlan
     * @return mixed
     */
    private function getLeftPartner($seatPosition, $seatingPlan)
    {
        $leftPartnerIndex = $seatPosition - 1;
        if ($leftPartnerIndex < 0) {
            $leftPartnerIndex = count($seatingPlan) - 1;
        }
        return $seatingPlan[$leftPartnerIndex];
    }

    /**
     * @param $seatPosition
     * @param $seatingPlan
     * @return mixed
     */
    private function getRightPartner($seatPosition, $seatingPlan)
    {
        $rightPartnerIndex = $seatPosition + 1;
        if ($rightPartnerIndex >= count($seatingPlan)) {
            $rightPartnerIndex = 0;
        }
        return $seatingPlan[$rightPartnerIndex];

    }

}
