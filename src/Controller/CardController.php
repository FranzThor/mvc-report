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
}