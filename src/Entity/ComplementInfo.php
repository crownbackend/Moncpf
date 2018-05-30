<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComplementInfoRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(type="string", length=255)
     */
    private $codeNaf;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="file_pdf", fileNameProperty="pdfName")
     *
     * @var File
     */
    private $pdfFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $pdfName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="file_pdf2", fileNameProperty="pdfName2")
     *
     * @var File
     */
    private $pdfFile2;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $pdfName2;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt2;



    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="file_pdf3", fileNameProperty="pdfName3")
     *
     * @var File
     */
    private $pdfFile3;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $pdfName3;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt3;
    


    public function __construct() {

        $this->createdAt = new \DateTime("now", new \DateTimeZone('Europe/Paris'));
    }


    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $pdf
     * @throws \Exception
     */
    public function setPdfFile(?File $pdf = null): void
    {
        $this->pdfFile = $pdf;

        if (null !== $pdf) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getPdfFile(): ?File
    {
        return $this->pdfFile;
    }

    public function setPdfName(?string $pdfName): void
    {
        $this->pdfName = $pdfName;
    }

    public function getPdfName(): ?string
    {
        return $this->pdfName;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $pdf2
     * @throws \Exception
     */
    public function setPdfFile2(?File $pdf2 = null): void
    {
        $this->pdfFile2 = $pdf2;

        if (null !== $pdf2) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt2 = new \DateTimeImmutable();
        }
    }

    public function getPdfFile2(): ?File
    {
        return $this->pdfFile2;
    }

    public function setPdfName2(?string $pdfName2): void
    {
        $this->pdfName2 = $pdfName2;
    }

    public function getPdfName2(): ?string
    {
        return $this->pdfName2;
    }


    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $pdf3
     * @throws \Exception
     */
    public function setPdfFile3(?File $pdf3 = null): void
    {
        $this->pdfFile3 = $pdf3;

        if (null !== $pdf3) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt3 = new \DateTimeImmutable();
        }
    }

    public function getPdfFile3(): ?File
    {
        return $this->pdfFile3;
    }

    public function setPdfName3(?string $pdfName3): void
    {
        $this->pdfName3 = $pdfName3;
    }

    public function getPdfName3(): ?string
    {
        return $this->pdfName3;
    }




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


    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }


}
