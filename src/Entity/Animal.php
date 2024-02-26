<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom_animal = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naissance_animal = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_creation_animal = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_fin_animal = null;

    #[ORM\Column(length: 255)]
 

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Race $race = null;

    #[ORM\OneToMany(targetEntity: Soigner::class, mappedBy: 'animal')]
    private Collection $soigners;

    public function __construct()
    {
        $this->soigners = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenomAnimal(): ?string
    {
        return $this->prenom_animal;
    }

    public function setPrenomAnimal(string $prenom_animal): static
    {
        $this->prenom_animal = $prenom_animal;

        return $this;
    }

    public function getDateNaissanceAnimal(): ?\DateTimeInterface
    {
        return $this->date_naissance_animal;
    }

    public function setDateNaissanceAnimal(\DateTimeInterface $date_naissance_animal): static
    {
        $this->date_naissance_animal = $date_naissance_animal;

        return $this;
    }

    public function getDateCreationAnimal(): ?\DateTimeInterface
    {
        return $this->date_creation_animal;
    }

    public function setDateCreationAnimal(\DateTimeInterface $date_creation_animal): static
    {
        $this->date_creation_animal = $date_creation_animal;

        return $this;
    }

    public function getDateFinAnimal(): ?\DateTimeInterface
    {
        return $this->date_fin_animal;
    }

    public function setDateFinAnimal(?\DateTimeInterface $date_fin_animal): static
    {
        $this->date_fin_animal = $date_fin_animal;

        return $this;
    }

  

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): static
    {
        $this->race = $race;

        return $this;
    }

    /**
     * @return Collection<int, Soigner>
     */
    public function getSoigners(): Collection
    {
        return $this->soigners;
    }

    public function addSoigner(Soigner $soigner): static
    {
        if (!$this->soigners->contains($soigner)) {
            $this->soigners->add($soigner);
            $soigner->setAnimal($this);
        }

        return $this;
    }

    public function removeSoigner(Soigner $soigner): static
    {
        if ($this->soigners->removeElement($soigner)) {
            // set the owning side to null (unless already changed)
            if ($soigner->getAnimal() === $this) {
                $soigner->setAnimal(null);
            }
        }

        return $this;
    }
}
