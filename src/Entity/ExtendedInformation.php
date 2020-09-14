<?php

namespace App\Entity;

use App\Repository\ExtendedInformationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExtendedInformationRepository::class)
 */
class ExtendedInformation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $staffList;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $classification;

    /**
     * @ORM\OneToOne(targetEntity=Media::class, inversedBy="informations", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $media;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStaffList(): ?string
    {
        return $this->staffList;
    }

    public function setStaffList(?string $staffList): self
    {
        $this->staffList = $staffList;

        return $this;
    }

    public function getClassification(): ?string
    {
        return $this->classification;
    }

    public function setClassification(?string $classification): self
    {
        $this->classification = $classification;

        return $this;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(Media $media): self
    {
        $this->media = $media;

        return $this;
    }
}
