<?php 

namespace App\Card;

use App\Card\Card;

class DeckWithJokers extends Deck 
{
    public function createDeck(): array
    {
        $joker = '🃏';
        $jokerValue = 'Joker';

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

        for ($i = 0; $i < 2; $i++) {
            array_push($this->cards, new Card($joker, $jokerValue));
        }

        return $this->cards;
    }
}