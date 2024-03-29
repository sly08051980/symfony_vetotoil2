<?php

namespace App\Entity;

use App\Repository\SoignerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoignerRepository::class)]
class Soigner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $acte_soins = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $traitement = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_soins = null;

   
    private ?Patient $patient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActeSoins(): ?string
    {
        return $this->acte_soins;
    }

    public function setActeSoins(?string $acte_soins): static
    {
        $this->acte_soins = $acte_soins;

        return $this;
    }

    public function getTraitement(): ?string
    {
        return $this->traitement;
    }

    public function setTraitement(?string $traitement): static
    {
        $this->traitement = $traitement;

        return $this;
    }

    public function getDateSoins(): ?\DateTimeInterface
    {
        return $this->date_soins;
    }

    public function setDateSoins(?\DateTimeInterface $date_soins): static
    {
        $this->date_soins = $date_soins;

        return $this;
    }
}
