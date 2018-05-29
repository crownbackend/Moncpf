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
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Votre entreprise doit avoir minimum {{ limit }} caractères !",
     *      maxMessage = "Votre entreprise ne doit pas dépasser {{ limit }} caractères !"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $society;

    /**
     * @Assert\Regex(
     *     pattern = "/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/",
     *     message = "Votre code postal n'est pas valide"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $zipCode;

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
     * @Assert\Regex(
     *     pattern = "/^[0-9]{4}[A-Z]{1}$/",
     *     match = true,
     *     message = "Votre code NAF doit comporter une suite de chiffres de 4 chiffres et une lettre en majuscule"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $codeNaf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $opca;

    /**
     * @Assert\Regex (
     *     pattern = "/^[a-zA-Zéèêëàâîïôöûü-]+$/",
     *     message = "Votre ville n'est pas correcte"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $city;


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

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

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


    public function getCodeNaf(): ?string
    {
        return $this->codeNaf;
    }

    public function setCodeNaf(string $codeNaf): self
    {
        $this->codeNaf = $codeNaf;

        return $this;
    }

    public function getOpca(): ?string
    {
        return $this->opca;
    }

    public function setOpca(string $opca): self
    {
        $this->opca = $opca;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

}
