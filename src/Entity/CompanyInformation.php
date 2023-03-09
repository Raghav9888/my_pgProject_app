<?php

namespace App\Entity;

use App\Repository\CompanyInformationRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CompanyInformationRepository::class)]
class CompanyInformation
{
    #[ORM\Column(type: 'guid')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator('doctrine.uuid_generator')]
    #[Groups(['read'])]

    private ?string $id = null;

    #[ORM\Column]
    private string $companyName;

    #[ORM\Column]
    private string $companyType;

    #[ORM\Column]
    private string  $companyNumber;

    #[ORM\Column]
    private bool  $duplicateNumber = true ;

    #[ORM\Column(type: "string",length: 255, nullable: true)]
    private ?string  $companyLogo = null;

    #[ORM\Column]
    private string  $city;

    #[ORM\Column]
    private string  $states;

    #[ORM\Column]
    private string  $country = 'IN';


    #[ORM\OneToOne(mappedBy: 'companyInformation', cascade: ['persist', 'remove'])]
    private ?OwnerInformation $ownerInformation = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getCompanyType(): string
    {
        return $this->companyType;
    }

    /**
     * @param string $companyType
     */
    public function setCompanyType(string $companyType): void
    {
        $this->companyType = $companyType;
    }

    /**
     * @return string
     */
    public function getCompanyNumber(): string
    {
        return $this->companyNumber;
    }

    /**
     * @param string $companyNumber
     */
    public function setCompanyNumber(string $companyNumber): void
    {
        $this->companyNumber = $companyNumber;
    }

    /**
     * @return bool
     */
    public function isDuplicateNumber(): bool
    {
        return $this->duplicateNumber;
    }

    /**
     * @param bool $duplicateNumber
     */
    public function setDuplicateNumber(bool $duplicateNumber): void
    {
        $this->duplicateNumber = $duplicateNumber;
    }

    /**
     * @return string|null
     */
    public function getCompanyLogo(): ?string
    {
        return $this->companyLogo;
    }

    /**
     * @param string|null $companyLogo
     */
    public function setCompanyLogo(?string $companyLogo): void
    {
        $this->companyLogo = $companyLogo;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getStates(): string
    {
        return $this->states;
    }

    /**
     * @param string $states
     */
    public function setStates(string $states): void
    {
        $this->states = $states;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return DateTime
     */
    public function getIsCreated(): DateTime
    {
        return $this->isCreated;
    }

    /**
     * @param DateTime $isCreated
     */
    public function setIsCreated(DateTime $isCreated): void
    {
        $this->isCreated = $isCreated;
    }

    public function getOwnerInformation(): ?OwnerInformation
    {
        return $this->ownerInformation;
    }

    public function setOwnerInformation(OwnerInformation $ownerInformation): self
    {
        // set the owning side of the relation if necessary
        if ($ownerInformation->getCompanyInformation() !== $this) {
            $ownerInformation->setCompanyInformation($this);
        }

        $this->ownerInformation = $ownerInformation;

        return $this;
    }


}
