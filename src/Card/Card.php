<?php

namespace App\Card;

class Card
{
    private $suit;
    private $rank;

    public function __construct($suit = null, $rank = null, $aceValue = null)
    {
        $this->suit = $suit;
        $this->rank = $rank;
        $this->aceValue = $aceValue;
    }

    public function getValue(): int
    {
        $value = $this->rank;

        if ($value == 'A') {
            if ($this->aceValue == 1) {
                $value = 1;
            } else {
                $value = 14;
            }
        } elseif ($value == 'J') {
            return 11;
        } elseif ($this->rank == 'Q') {
            return 12;
        } elseif ($this->rank == "K") {
            return 13;
        }

        return $value;
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function toString(): string
    {
        return "[{$this->suit}{$this->rank}]";
    }
}
