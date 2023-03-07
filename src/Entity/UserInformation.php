<?php

namespace App\Entity;

use App\Repository\UserInformationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'user_information')]
#[ORM\Index(columns: ['id'], name: 'index_id')]
#[ORM\Entity(repositoryClass: UserInformationRepository::class)]
class UserInformation extends AbstractEntity
{
    #[ORM\Column(nullable: true)]
    private ?string $setting = null;

    #[ORM\OneToOne(mappedBy: 'userInformation', cascade: ['persist', 'remove'])]
    private ?USer $uSer = null;

    #[ORM\OneToOne(mappedBy: 'userInformation', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    /**
     * @return string|null
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setUserInformation(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getUserInformation() !== $this) {
            $user->setUserInformation($this);
        }

        $this->user = $user;

        return $this;
    }


}
