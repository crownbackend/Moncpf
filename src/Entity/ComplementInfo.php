<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComplementInfoRepository")
 */
class ComplementInfo
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
    private $society;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cityOfSociety;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $professionalCategory;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeOfContract;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numberSiret;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $selectedTraining;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cpfTime;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     */
    private $identityUser;

    public function getId()
    {
        return $this->id;
    }

    public function getSociety(): ?string
    {
        return $this->society;
    }

    public function setSociety(?string $society): self
    {
        $this->society = $society;

        return $this;
    }

    public function getCityOfSociety(): ?string
    {
        return $this->cityOfSociety;
    }

    public function setCityOfSociety(string $cityOfSociety): self
    {
        $this->cityOfSociety = $cityOfSociety;

        return $this;
    }

    public function getProfessionalCategory(): ?string
    {
        return $this->professionalCategory;
    }

    public function setProfessionalCategory(string $professionalCategory): self
    {
        $this->professionalCategory = $professionalCategory;

        return $this;
    }

    public function getTypeOfContract(): ?string
    {
        return $this->typeOfContract;
    }

    public function setTypeOfContract(string $typeOfContract): self
    {
        $this->typeOfContract = $typeOfContract;

        return $this;
    }

    public function getNumberSiret(): ?string
    {
        return $this->numberSiret;
    }

    public function setNumberSiret(string $numberSiret): self
    {
        $this->numberSiret = $numberSiret;

        return $this;
    }

    public function getSelectedTraining(): ?string
    {
        return $this->selectedTraining;
    }

    public function setSelectedTraining(string $selectedTraining): self
    {
        $this->selectedTraining = $selectedTraining;

        return $this;
    }

    public function getCpfTime(): ?string
    {
        return $this->cpfTime;
    }

    public function setCpfTime(string $cpfTime): self
    {
        $this->cpfTime = $cpfTime;

        return $this;
    }

    public function getIdentityUser(): ?User
    {
        return $this->identityUser;
    }

    public function setIdentityUser(?User $identityUser): self
    {
        $this->identityUser = $identityUser;

        return $this;
    }
}
