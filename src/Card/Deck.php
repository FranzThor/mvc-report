<?php

namespace App\Card;

use App\Card\Card;

class Deck
{
    public $cards;
    public $suits;
    public $ranks;

    public function __construct($aceValue = null)
    {
        $this->cards = [];
        $this->suits = ['♣', '♦️', '♥️', '♠️'];
        $this->aceValue = $aceValue;

        if ($this->aceValue == 1) {
            $this->ranks = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];
        } else {
            $this->ranks = [2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K', 'A'];
        }
    }

    public function createDeck(): array
    {
        for ($i = 0; $i < count($this->suits); $i++) {
            for ($j = 0; $j < count($this->ranks); $j++) {
                if ($this->aceValue == 1) {
                    array_push($this->cards, new Card(
                    $this->suits[$i],
                    $this->ranks[$j], 1)
                );
                } else {
                    array_push($this->cards, new Card(
                        $this->suits[$i],
                        $this->ranks[$j])
                    );
                }
            }
        }

        return $this->cards;
    }

    public function deckToString(): string
    {
        $str = "";
        foreach ($this->cards as $card) {
            $str .= $card->toString();
        }

        return $str;
    }
}
