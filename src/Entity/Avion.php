<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvionRepository")
 */
class Avion
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
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Transporteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Destination;

    /**
     * @ORM\Column(type="float")
     */
    private $vitesse;

   

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vole", mappedBy="avion")
     */
    private $voles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTransporteur(): ?string
    {
        return $this->Transporteur;
    }

    public function setTransporteur(string $Transporteur): self
    {
        $this->Transporteur = $Transporteur;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->Destination;
    }

    public function setDestination(string $Destination): self
    {
        $this->Destination = $Destination;

        return $this;
    }

    public function getVitesse(): ?float
    {
        return $this->vitesse;
    }

    public function setVitesse(float $vitesse): self
    {
        $this->vitesse = $vitesse;

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
            $vole->setAvion($this);
        }

        return $this;
    }

    public function removeVole(Vole $vole): self
    {
        if ($this->voles->contains($vole)) {
            $this->voles->removeElement($vole);
            // set the owning side to null (unless already changed)
            if ($vole->getAvion() === $this) {
                $vole->setAvion(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
    public function __toString(){
        return $this->nom;
    }
}
