<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\OpeningHours;
use App\Form\BookingType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    #[Route('/reservation', name: 'app_booking')]
    public function book(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $booking = $form->getData();

            $entityManager->persist($booking);
            $entityManager->flush();

            return $this->redirectToRoute('booking_success');
        }

        $repository = $doctrine->getRepository(OpeningHours::class);
        $openingHours = $repository->findAll();

        return $this->render('booking/index.html.twig', [
            'bookingForm' => $form->createView(),
            'openingHours' => $openingHours
        ]);
    }
}
