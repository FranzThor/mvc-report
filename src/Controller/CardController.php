<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    /**
     * @Route ("/card", name="card-home")
     */

    public function home(): Response
    {
        return $this->render('card/home.html.twig');
    }

    /**
     * @Route ("/card/deck", name="card-deck")
     */
    public function deck(): Response
    {
        $deck = new \App\Card\Deck(1);
        $data = [
            'deckOfCards' => $deck->createDeck(),
            'deckToString' => $deck->deckToString()
        ];

        return $this->render('card/deck.html.twig', $data);
    }

    /**
     * @Route ("/card/shuffle", name="card-shuffle")
     */
    public function shuffle(): Response
    {
        $deck = new \App\Card\Deck(1);
        $data = [
            'deckOfCards' => $deck->createDeck(),
            'shuffle' => $deck->shuffle(),
            'deckToString' => $deck->deckToString()
        ];


        return $this->render('card/shuffle.html.twig', $data);
    }

    /**
     * @Route ("/card/draw", name="card-draw")
     */
    public function draw(): Response
    {
        $deck = new \App\Card\Deck(1);
        $data = [
            'deckOfCards' => $deck->createDeck(),
            'shuffle' => $deck->shuffle(),
            'draw' => $deck->dealCard(),
            'deckToString' => $deck->deckToString()
        ];


        return $this->render('card/draw.html.twig', $data);
    }
}
