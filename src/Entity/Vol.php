<?php

namespace App\Entity;

use App\Repository\VolRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\UnicodeString;

#[ORM\Entity(repositoryClass: VolRepository::class)]
class Vol
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 6)]
    private ?string $VolNum = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Hdepart = null;

    #[ORM\Column(length: 255)]
    private ?string $VilleDepart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Harrivee = null;

    #[ORM\Column(length: 255)]
    private ?string $VilleArrivee = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $nbPlaces = null;

    #[ORM\Column]
    private ?bool $reduction = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVolNum(): ?string
    {
        $bytes = random_bytes(3); // Génère 3 octets aléatoires
        $VolNum = bin2hex($bytes); // Convertit les octets en une chaîne hexadécimale
        $VolNum = substr($VolNum, 0, 2) . '-' . substr($VolNum, 2, 4); // Sépare la chaîne en 2 lettres et 4 chiffres avec un tiret
        $VolNum = (new UnicodeString($VolNum))->upper();
        return $this->VolNum;
    }

    public function setVolNum(string $VolNum): self
    {
        $this->VolNum = $VolNum;

        return $this;
    }

    public function getHdepart(): ?\DateTimeInterface
    {
        return $this->Hdepart;
    }

    public function setHdepart(\DateTimeInterface $Hdepart): self
    {
        $this->Hdepart = $Hdepart;

        return $this;
    }

    public function getVilleDepart(): ?string
    {
        return $this->VilleDepart;
    }

    public function setVilleDepart(string $VilleDepart): self
    {
        $this->VilleDepart = $VilleDepart;

        return $this;
    }

    public function getHarrivee(): ?\DateTimeInterface
    {
        return $this->Harrivee;
    }

    public function setHarrivee(\DateTimeInterface $Harrivee): self
    {
        $this->Harrivee = $Harrivee;

        return $this;
    }

    public function getVilleArrivee(): ?string
    {
        return $this->VilleArrivee;
    }

    public function setVilleArrivee(string $VilleArrivee): self
    {
        $this->VilleArrivee = $VilleArrivee;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces(int $nbPlaces): self
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    public function isReduction(): ?bool
    {
        return $this->reduction;
    }

    public function setReduction(bool $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }
}
