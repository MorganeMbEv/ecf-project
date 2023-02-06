<?php

namespace App\Controller;

use App\Entity\Picture;
use App\Form\ConnectionType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository =$doctrine->getRepository(Picture::class);
        $pictures = $repository->findAll();

        return $this->render('homepage/index.html.twig', [
            'pictures' => $pictures,
        ]);
    }
}
