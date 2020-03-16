<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CardRepository")
 */
class Card
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
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ImageUrl;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Effects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Effects;

    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }


    public function getImageUrl(): ?string
    {
        return $this->ImageUrl;
    }

    public function setImageUrl(string $ImageUrl): self
    {
        $this->ImageUrl = $ImageUrl;

        return $this;
    }

    public function getEffects(): ?Effects
    {
        return $this->Effects;
    }

    public function setEffects(?Effects $Effects): self
    {
        $this->Effects = $Effects;

        return $this;
    }
}
