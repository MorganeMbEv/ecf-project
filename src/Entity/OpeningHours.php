<?php

namespace App\Entity;

use App\Repository\OpeningHoursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningHoursRepository::class)]
class OpeningHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $day = null;

    #[ORM\Column(length: 50)]
    private ?array $status = [];

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $lunchOpening = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $lunchClosing = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $dinnerOpening = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $dinnerClosing = null;

    #[ORM\Column(nullable: true)]
    private ?int $maxCustomers = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getStatus(): array
    {
        $status = $this->status;
        $status[] = 'open';

        return array_unique($status);
    }

    public function setStatus(array $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getLunchOpening(): ?\DateTimeInterface
    {
        return $this->lunchOpening;
    }

    public function setLunchOpening(\DateTimeInterface $lunchOpening): self
    {
        $this->lunchOpening = $lunchOpening;

        return $this;
    }

    public function getLunchClosing(): ?\DateTimeInterface
    {
        return $this->lunchClosing;
    }

    public function setLunchClosing(\DateTimeInterface $lunchClosing): self
    {
        $this->lunchClosing = $lunchClosing;

        return $this;
    }

//    public function getLunchOpeningFormat($format = 'H:i')
//    {
//        return $this->lunchOpening->format($format);
//    }

    public function getDinnerOpening(): ?\DateTimeInterface
    {
        return $this->dinnerOpening;
    }

    public function setDinnerOpening(\DateTimeInterface $dinnerOpening): self
    {
        $this->dinnerOpening = $dinnerOpening;

        return $this;
    }

    public function getDinnerClosing(): ?\DateTimeInterface
    {
        return $this->dinnerClosing;
    }

    public function setDinnerClosing(\DateTimeInterface $dinnerClosing): self
    {
        $this->dinnerClosing = $dinnerClosing;

        return $this;
    }

    public function getMaxCustomers(): ?int
    {
        return $this->maxCustomers;
    }

    public function setMaxCustomers(?int $maxCustomers): self
    {
        $this->maxCustomers = $maxCustomers;

        return $this;
    }
}
