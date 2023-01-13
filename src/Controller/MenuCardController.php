<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuCardController extends AbstractController
{
    #[Route('/menus', name: 'app_menu_card')]
    public function cre(): Response
    {


        return $this->render('menu_card/index.html.twig', [
            'controller_name' => 'MenuCardController',
        ]);
    }
}
