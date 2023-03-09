<?php

namespace App\Entity;

use App\Repository\DefaultCompanyRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Table(name: 'default_company')]
#[ORM\Index(columns: ['id'], name: 'index_id')]
#[ORM\Entity(repositoryClass: DefaultCompanyRepository::class)]
class DefaultCompany
{
    #[ORM\Column(type: 'guid')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator('doctrine.uuid_generator')]
    #[Groups(['read'])]

    private ?string $id = null;

    #[ORM\Column]
    private string $accountType;

    #[ORM\Column]
    private string $title = 'Royal Reside';

    #[ORM\Column(nullable: true)]
    private string $companyLogo = 'logo.png';

    #[ORM\OneToOne(mappedBy: 'defaultCompany', cascade: ['persist', 'remove'])]
    private ?UserInformation $userInformation = null;

    public function getId(): ?string
    {
        return $this->id;
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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getCompanyLogo(): string
    {
        return $this->companyLogo;
    }

    /**
     * @param string $companyLogo
     */
    public function setCompanyLogo(string $companyLogo): void
    {
        $this->companyLogo = $companyLogo;
    }


    public function getUserInformation(): ?UserInformation
    {
        return $this->userInformation;
    }

    public function setUserInformation(UserInformation $userInformation): self
    {
        // set the owning side of the relation if necessary
        if ($userInformation->getDefaultCompany() !== $this) {
            $userInformation->setDefaultCompany($this);
        }

        $this->userInformation = $userInformation;

        return $this;
    }
}
