<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Dish;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuCardController extends AbstractController
{
    #[Route('/la-carte', name: 'app_menu_card')]
    public function displayDishes(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Category::class);
        $categories = $repository->findAll();

        $repository = $doctrine->getRepository(Dish::class);
        $dishesLunch = $repository->findBy(['timeOfTheDay' => 'midi']);
        $dishesDinner = $repository->findBy(['timeOfTheDay' => 'soir']);

        return $this->render('menu_card/index.html.twig', [
            'categories' => $categories,
            'dishesLunch' => $dishesLunch,
            'dishesDinner' => $dishesDinner

        ]);
    }
}
