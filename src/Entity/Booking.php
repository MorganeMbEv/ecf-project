<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[Assert\NotBlank]
    #[Assert\Regex('/^(?:0|\+33 ?|0?0?33 ?|)([1-9] ?(?:[0-9] ?){8})$/i')]
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

    #[Assert\NotBlank]
    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $time = null;

    #[ORM\ManyToMany(targetEntity: Allergy::class, inversedBy: 'bookings')]
    private Collection $allergies;

    #[ORM\Column]
    private ?int $shift = null;

    public function __construct()
    {
        $this->allergies = new ArrayCollection();
        $this->date = new \DateTime();
    }

    
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

    //public function __toString(){
//
    //    return $this->date;
    //}

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

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

//    public function getTimeFormat($format = 'H:i')
//    {
//        return $this->time->format($format);
//    }

    /**
     * @return Collection<int, Allergy>
     */
    public function getAllergies(): Collection
    {
        return $this->allergies;
    }
    
    public function addAllergy(Allergy $allergy): self
    {
        if (!$this->allergies->contains($allergy)) {
            $this->allergies->add($allergy);
        }
    
        return $this;
    }
    
    public function removeAllergy(Allergy $allergy): self
    {
        $this->allergies->removeElement($allergy);
    
        return $this;
    }
    
    public function getShift(): ?int
    {
        return $this->shift;
    }
    
    public function setShift(int $shift): self
    {
        $this->shift = $shift;
        
        return $this;
    }

    public function __toString(){

        return $this->shift;
    }
}