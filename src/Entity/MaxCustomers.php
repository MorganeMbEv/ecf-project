<?php

namespace App\Entity;

use App\Repository\MaxCustomersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaxCustomersRepository::class)]
class MaxCustomers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $thresholdNumber = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThresholdNumber(): ?int
    {
        return $this->thresholdNumber;
    }

    public function setThresholdNumber(int $thresholdNumber): self
    {
        $this->thresholdNumber = $thresholdNumber;

        return $this;
    }
}
