<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\AdminBookingType;
use App\Repository\BookingRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminBookingController extends AbstractController
{
    /**
     * @Route("/admin/bookings", name="admin_booking_index")
     */
    public function index(BookingRepository $repo)
    {
        $bookings = $repo->findAll();
        return $this->render('admin/booking/index.html.twig', [
            'bookings' => $bookings
        ]);
    }

    /**
     * Permet d'éditer une réservation
     *
     * @ROute("/admin/bookings/{id}/edit", name="admin_booking_edit")
     *
     * @return Response
     */
    public function edit(Booking $booking, Request $request, ObjectManager $manager)
    {
        $booking->setAmount(0);

        $form = $this->createForm(AdminBookingType::class, $booking);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($booking);
            $manager->flush();

            $this->addFlash(
                'success',
                "La reservation N°{$booking->getId()} a bien été modifiée"
            );

            return $this->redirectToRoute("admin_booking_index");
        }

        return $this->render('admin/booking/edit.html.twig', [
            'form' => $form->createView(),
            'booking' => $booking,
        ]);
    }

    /**
     * Permet de supprimer une réservation
     *
     * @Route("/admin/booking/{id}/delete", name="admin_booking_delete")
     *
     * @param Booking $booking
     *
     * @return Response
     */
    public function delete(Booking $booking,ObjectManager $manager)
    {

        $booking_clone = clone $booking;

        $manager->remove($booking);
        $manager->flush();

        $this->addFlash(
            'success',
            "la réservation n°{$booking_clone->getId()} à bien été supprimée "
        );

        return $this->redirectToRoute("admin_booking_index");
    }
}
