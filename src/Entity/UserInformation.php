<?php

namespace App\Entity;

use App\Repository\UserInformationRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Table(name: 'user_information')]
#[ORM\Index(columns: ['id'], name: 'index_id')]
#[ORM\Entity(repositoryClass: UserInformationRepository::class)]
class UserInformation
{
    #[ORM\Column(type: 'guid')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator('doctrine.uuid_generator')]
    #[Groups(['read'])]

    private ?string $id = null;

    #[ORM\Column(nullable: true)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?string $gender = null;

    #[ORM\Column(nullable: true)]
    private ?string $userNumber = null;

    #[ORM\Column]
    private string $accountType ;

    #[ORM\Column(nullable: true)]
    private ?string $setting = null;

    #[ORM\Column(type: 'boolean' ,options: ['default' => 0] )]
    private  bool $isDeleted = false;
    #[ORM\Column(type: 'datetime')]
    private DateTime $isCreatedAt;

    #[ORM\Column(type: 'datetime' , nullable: true)]
    private DateTime $isUpdatedAt ;

    #[ORM\Column(type: 'datetime' , nullable: true)]
    private DateTime $isDeletedAt ;


    #[ORM\OneToOne(inversedBy: 'userInformation', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?DefaultCompany $defaultCompany = null;

    #[ORM\OneToOne(inversedBy: 'userInformation', cascade: ['persist', 'remove'])]
    private ?CompanyInformation $companyInformation = null;

    #[ORM\OneToOne(mappedBy: 'userInformation', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string|null $gender
     */
    public function setGender(?string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string|null
     */
    public function getUserNumber(): ?string
    {
        return $this->userNumber;
    }

    /**
     * @param string|null $userNumber
     */
    public function setUserNumber(?string $userNumber): void
    {
        $this->userNumber = $userNumber;
    }

    /**
     * @return string
     */
    public function getAccountType(): string
    {
        return $this->accountType;
    }

    /**
     * @param string $accountType
     */
    public function setAccountType(string $accountType): void
    {
        $this->accountType = $accountType;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    /**
     * @param bool $isDeleted
     */
    public function setIsDeleted(bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

    /**
     * @return DateTime
     */
    public function getIsCreatedAt(): DateTime
    {
        return $this->isCreatedAt;
    }

    /**
     * @param DateTime $isCreatedAt
     */
    public function setIsCreatedAt(DateTime $isCreatedAt): void
    {
        $this->isCreatedAt = $isCreatedAt;
    }

    /**
     * @return DateTime
     */
    public function getIsUpdatedAt(): DateTime
    {
        return $this->isUpdatedAt;
    }

    /**
     * @param DateTime $isUpdatedAt
     */
    public function setIsUpdatedAt(DateTime $isUpdatedAt): void
    {
        $this->isUpdatedAt = $isUpdatedAt;
    }

    /**
     * @return DateTime
     */
    public function getIsDeletedAt(): DateTime
    {
        return $this->isDeletedAt;
    }

    /**
     * @param DateTime $isDeletedAt
     */
    public function setIsDeletedAt(DateTime $isDeletedAt): void
    {
        $this->isDeletedAt = $isDeletedAt;
    }


    /**
     * @return string|null
     *
     */
    public function getSetting(): ?string
    {
        return $this->setting;
    }

    /**
     * @param string|null $setting
     */
    public function setSetting(?string $setting): void
    {
        $this->setting = $setting;
    }

    public function getDefaultCompany(): ?DefaultCompany
    {
        return $this->defaultCompany;
    }

    public function setDefaultCompany(DefaultCompany $defaultCompany): self
    {
        $this->defaultCompany = $defaultCompany;

        return $this;
    }

    public function getCompanyInformation(): ?CompanyInformation
    {
        return $this->companyInformation;
    }

    public function setCompanyInformation(?CompanyInformation $companyInformation): self
    {
        $this->companyInformation = $companyInformation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        // set the owning side of the relation if necessary
        if ($user->getUserInformation() !== $this) {
            $user->setUserInformation($this);
        }

        $this->user = $user;

        return $this;
    }


}
