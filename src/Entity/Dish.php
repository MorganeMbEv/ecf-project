<?php

namespace App\Entity;

use App\Repository\DishRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DishRepository::class)]
class Dish
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    private ?string $timeOfTheDay = null;

    #[ORM\ManyToOne(inversedBy: 'dishes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $categoryDish = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getTimeOfTheDay(): ?string
    {
        return $this->timeOfTheDay;
    }

    public function setTimeOfTheDay(string $timeOfTheDay): self
    {
        $this->timeOfTheDay = $timeOfTheDay;

        return $this;
    }

    public function getCategoryDish(): ?Category
    {
        return $this->categoryDish;
    }

    public function setCategoryDish(?Category $category): self
    {
        $this->categoryDish = $category;

        return $this;
    }
}
