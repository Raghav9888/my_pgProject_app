<?php

namespace App\Entity;

use App\Repository\UserInformationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'user_information')]
#[ORM\Index(columns: ['id'], name: 'index_id')]
#[ORM\Entity(repositoryClass: UserInformationRepository::class)]
class UserInformation extends AbstractNameEntity
{
    #[ORM\Column(nullable: true)]
    private ?string $setting = null;

    #[ORM\OneToOne(inversedBy: 'userInformation', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?DefaultCompany $defaultCompany = null;

    #[ORM\OneToOne(inversedBy: 'userInformation', cascade: ['persist', 'remove'])]
    private ?CompanyInformation $companyInformation = null;

    #[ORM\OneToOne(mappedBy: 'userInformation', cascade: ['persist', 'remove'])]
    private ?User $user = null;


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
