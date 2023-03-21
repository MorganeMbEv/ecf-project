<?php

namespace App\Entity;

use App\Repository\TableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TableRepository::class)]
#[ORM\Table(name: '`table`')]
class Table
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $TableName = null;

    #[ORM\Column]
    private ?int $NumberOfTable = null;

    #[ORM\Column]
    private ?int $numberOfPerson = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTableName(): ?string
    {
        return $this->TableName;
    }

    public function setTableName(string $TableName): self
    {
        $this->TableName = $TableName;

        return $this;
    }

    public function getNumberOfTable(): ?int
    {
        return $this->NumberOfTable;
    }

    public function setNumberOfTable(int $NumberOfTable): self
    {
        $this->NumberOfTable = $NumberOfTable;

        return $this;
    }

    public function getNumberOfPerson(): ?int
    {
        return $this->numberOfPerson;
    }

    public function setNumberOfPerson(int $numberOfPerson): self
    {
        $this->numberOfPerson = $numberOfPerson;

        return $this;
    }
}
