<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Table;
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
        $newBooking = new Booking();
        $form = $this->createForm(BookingType::class, $newBooking);
        $form->handleRequest($request);

        $repository = $doctrine->getRepository(Table::class);
        $table = $repository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $booking = $form->getData();
            $date = $booking->getDate();

            if ($booking->getTime() < '15:00:00') {
                echo $booking->setShift(1);
            } else {
                echo $booking->setShift(2);
            };

            $shift = $booking->getShift();
            $numberOfCustomers = $entityManager->getRepository(Booking::class)->findNumberOfCustomers($date, $shift);

            $entityManager->persist($booking);
            $entityManager->flush();

            return $this->redirectToRoute('booking_success');
        }

        return $this->render('booking/index.html.twig', [
            'bookingForm' => $form->createView(),
            
        ]);
    }
}
