<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    #[Route('/reservation', name: 'app_booking')]
    public function book(Request $request, EntityManagerInterface $entityManager): Response
    {
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
        //    
        //}

        return $this->render('booking/index.html.twig', [
            'bookingForm' => $form->createView(),
        ]);
    }
}
