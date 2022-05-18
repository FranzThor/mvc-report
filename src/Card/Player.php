<?php

namespace App\Card;

use App\Card\Card;

class Player 
{
    private $hand;

    public function __construct($name) {
        $this->hand = [];
        $this->name = $name;
    }

    public function hit($card) {
        array_push($this->hand, $card);

        return $this->hand;
    }

    public function getName() {
        return $this->name;
    }

    public function getHand() : string {
        $str = "";
        foreach ($this->hand as $card) {
            $str .= $card->toString();
        }

        return $str;
    }
}

?>