<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoleRepository")
 */
class Vole
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heurdepart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heurearrive;

   

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Avion", inversedBy="voles")
     */
    private $avion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aeroport_depart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aeroport_arrive;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compagnie", inversedBy="voles")
     */
    private $compagnie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservation", mappedBy="vole")
     */
    private $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeurdepart(): ?\DateTimeInterface
    {
        return $this->heurdepart;
    }

    public function setHeurdepart(\DateTimeInterface $heurdepart): self
    {
        $this->heurdepart = $heurdepart;

        return $this;
    }

    public function getHeurearrive(): ?\DateTimeInterface
    {
        return $this->heurearrive;
    }

    public function setHeurearrive(\DateTimeInterface $heurearrive): self
    {
        $this->heurearrive = $heurearrive;

        return $this;
    }

    

    public function getAvion(): ?Avion
    {
        return $this->avion;
    }

    public function setAvion(?Avion $avion): self
    {
        $this->avion = $avion;

        return $this;
    }

    public function getAeroportDepart(): ?string
    {
        return $this->aeroport_depart;
    }

    public function setAeroportDepart(string $aeroport_depart): self
    {
        $this->aeroport_depart = $aeroport_depart;

        return $this;
    }

    public function getAeroportArrive(): ?string
    {
        return $this->aeroport_arrive;
    }

    public function setAeroportArrive(string $aeroport_arrive): self
    {
        $this->aeroport_arrive = $aeroport_arrive;

        return $this;
    }

    public function getCompagnie(): ?Compagnie
    {
        return $this->compagnie;
    }

    public function setCompagnie(?Compagnie $compagnie): self
    {
        $this->compagnie = $compagnie;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setVole($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getVole() === $this) {
                $reservation->setVole(null);
            }
        }

        return $this;
    }
}
