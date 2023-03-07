<?php

namespace App\Entity;

use App\Repository\DefaultTextRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DefaultTextRepository::class)]
class DefaultText
{
    #[ORM\Column(type: 'guid')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator('doctrine.uuid_generator')]
    #[Groups(['read'])]
    private ?string $id = null;

    #[ORM\OneToOne(mappedBy: 'defaultText', cascade: ['persist', 'remove'])]
    private ?OwnerInformation $ownerInformation = null;
    public function getId(): ?string
    {
        return $this->id;
    }

    public function getOwnerInformation(): ?OwnerInformation
    {
        return $this->ownerInformation;
    }

    public function setOwnerInformation(OwnerInformation $ownerInformation): self
    {
        // set the owning side of the relation if necessary
        if ($ownerInformation->getDefaultText() !== $this) {
            $ownerInformation->setDefaultText($this);
        }

        $this->ownerInformation = $ownerInformation;

        return $this;
    }

}
