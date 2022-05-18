<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
            'link_to_draws' => $this->generateURL('card-draw', ['noOfDraws' => 1,])
        ];

        return $this->render('card/deck.html.twig', $data);
    }

    /**
     * @Route ("/card/deck/shuffle", name="card-shuffle")
     */
    public function shuffle(
        SessionInterface $session
    ): Response
    {
        $deck = new \App\Card\Deck(1);
        $session->set("cards", $deck);
        $session->set("cardsOnHand", []); 
        $data = [
            'deckOfCards' => $deck->createDeck(),
            'shuffle' => $deck->shuffle(),
            'deckToString' => $deck->deckToString()
        ];

        return $this->render('card/shuffle.html.twig', $data);
    }

    /**
     * @Route ("/card/deck/draw/{noOfDraws}", name="card-draw")
     */
    public function draw(SessionInterface $session, int $noOfDraws = 1): Response {
        $deck = $session->get("cards");
        $cardsOnHand = $session->get("cardsOnHand");
        
        for ($i = 0; $i < $noOfDraws; $i++) {
            array_push($cardsOnHand, $deck->dealCard());
        }
        
        $session->set("cardsOnHand", $cardsOnHand);

        $data = [
            'draws' => $cardsOnHand,
            'deckToString' => $deck->deckToString()
        ];

        return $this->render('card/draw.html.twig', $data);
    }

    /**
     * @Route ("/card/deck/deal/{noOfPlayers}/{noOfCards}", name="deal-cards")
     */
    public function deal(SessionInterface $session, $noOfPlayers = 0, $noOfCards = 0): Response {
        $deck = $session->get("cards");
        $players = [];

        for ($i = 1; $i <= $noOfPlayers; $i++) {
            array_push($players, new \App\Card\Player("Player ${i}"));

            for ($j = 0; $j < $noOfCards; $j++) {
                $players[$i - 1]->hit($deck->dealCard());
            }
        }

        $data = [
            'players' => $players,
            'deckToString' => $deck->deckToString()
        ];

        return $this->render('card/deal.html.twig', $data);
    }
}
