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
<<<<<<< HEAD
    public function displayHours(ManagerRegistry $doctrine): Response
=======
    public function displayHours(ManagerRegistry $doctrine ): Response
>>>>>>> 52acf636672c4add4bec17a55d465065e3cfe9e6
    {
        $repository = $doctrine->getRepository(OpeningHours::class);
        $openingHours = $repository->findAll();

<<<<<<< HEAD
=======
        

>>>>>>> 52acf636672c4add4bec17a55d465065e3cfe9e6
        return $this->render('_partials/_openingHours.html.twig', [
            'openingHours' => $openingHours
        ]);
    }
}
