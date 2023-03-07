<?php

namespace App\Entity;

use App\Repository\UserInformationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
#[ORM\Index(columns: ['id'], name: 'index_id')]
#[ORM\Entity(repositoryClass: UserInformationRepository::class)]
class UserInformation extends AbstractEntity
{
    #[ORM\Column(nullable: true)]
    private ?string $setting = null;

    #[ORM\OneToOne(mappedBy: 'userInformation', cascade: ['persist', 'remove'])]
    private ?USer $uSer = null;

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


}
