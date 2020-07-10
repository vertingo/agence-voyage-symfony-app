<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompagnieRepository")
 */
class Compagnie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $origine;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $chiffredaffair;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $datecreation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vole", mappedBy="compagnie")
     */
    private $voles;

    public function __construct()
    {
        $this->voles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(string $origine): self
    {
        $this->origine = $origine;

        return $this;
    }

    public function getChiffredaffair(): ?string
    {
        return $this->chiffredaffair;
    }

    public function setChiffredaffair(string $chiffredaffair): self
    {
        $this->chiffredaffair = $chiffredaffair;

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

    public function getDatecreation(): ?string
    {
        return $this->datecreation;
    }

    public function setDatecreation(string $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection|Vole[]
     */
    public function getVoles(): Collection
    {
        return $this->voles;
    }

    public function addVole(Vole $vole): self
    {
        if (!$this->voles->contains($vole)) {
            $this->voles[] = $vole;
            $vole->setCompagnie($this);
        }

        return $this;
    }

    public function removeVole(Vole $vole): self
    {
        if ($this->voles->contains($vole)) {
            $this->voles->removeElement($vole);
            // set the owning side to null (unless already changed)
            if ($vole->getCompagnie() === $this) {
                $vole->setCompagnie(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->nom;
    }
}
