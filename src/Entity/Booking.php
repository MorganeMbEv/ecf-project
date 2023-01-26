<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[Assert\NotBlank]
    #[Assert\DateTime('Y-m-d')]
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[Assert\NotBlank]
    #[Assert\Length(exactly: 10)]
    #[ORM\Column]
    private ?int $phoneNumber = null;

    #[Assert\NotBlank]
    #[Assert\Email(message: 'L\'adresse e-mail {{ value }} n\'est pas valide.')]
    #[ORM\Column(length: 255)]
    private ?string $emailAdress = null;

    #[Assert\GreaterThan(0, message : 'Réservation possible au minimum pour 1 couvert.')]
    #[Assert\LessThanOrEqual(10, message : 'Réservation possible pour {{ compared_value }} couverts ou moins.')]
    #[Assert\Positive]
    #[ORM\Column]
    private ?int $guestNumber = null;

    #[Assert\Time]
    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $bookingTime = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(int $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmailAdress(): ?string
    {
        return $this->emailAdress;
    }

    public function setEmailAdress(string $emailAdress): self
    {
        $this->emailAdress = $emailAdress;

        return $this;
    }

    public function getGuestNumber(): ?int
    {
        return $this->guestNumber;
    }

    public function setGuestNumber(int $guestNumber): self
    {
        $this->guestNumber = $guestNumber;

        return $this;
    }

    public function getBookingTime(): ?\DateTimeInterface
    {
        return $this->bookingTime;
    }

    public function setBookingTime(\DateTimeInterface $bookingTime): self
    {
        $this->bookingTime = $bookingTime;

        return $this;
    }

}