<?php

namespace App\Entity;

use App\Repository\OwnerInformationRepository;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Table(name: 'owner_information')]
#[ORM\Index(columns: ['id'], name: 'index_id')]
#[ORM\Entity(repositoryClass: OwnerInformationRepository::class)]
class OwnerInformation extends AbstractNameEntity
{

    #[ORM\OneToOne(mappedBy: 'ownerInformation', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\OneToOne(inversedBy: 'ownerInformation', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?DefaultCompany $defaultCompany = null;

    #[ORM\OneToOne(inversedBy: 'ownerInformation', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?CompanyInformation $companyInformation = null;

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setOwnerInformation(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getOwnerInformation() !== $this) {
            $user->setOwnerInformation($this);
        }

        $this->user = $user;

        return $this;
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

    public function setCompanyInformation(CompanyInformation $companyInformation): self
    {
        $this->companyInformation = $companyInformation;

        return $this;
    }
}
