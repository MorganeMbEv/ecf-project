<?php

namespace App\Controller;

use App\Entity\OpeningHours;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OpeningHoursController extends AbstractController
{
    #[Route('/horaires-ouverture')]
    public function displayHours(ManagerRegistry $doctrine ): Response
    {
        $repository = $doctrine->getRepository(OpeningHours::class);
        $openingHours = $repository->findAll();

        

        return $this->render('_partials/_openingHours.html.twig', [
            'openingHours' => $openingHours
        ]);
    }
}
