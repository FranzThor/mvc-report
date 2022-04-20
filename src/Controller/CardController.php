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
            'deckToString' => $deck->deckToString(),
        ];

        return $this->render('card/deck.html.twig', $data);
    }
}
