<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingSuccessController extends AbstractController
{
    #[Route('/reservation/succes', name: 'booking_success')]
    public function index(): Response
    {
        return $this->render('booking_success/index.html.twig', [
            'controller_name' => 'BookingSuccessController',
        ]);
    }
}
