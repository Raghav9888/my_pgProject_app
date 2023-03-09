<?php

namespace App\Entity;


use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\MappedSuperclass]
#[ORM\HasLifecycleCallbacks]
abstract class AbstractNameEntity
{

    #[ORM\Column(type: 'guid')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator('doctrine.uuid_generator')]
    #[Groups(['read'])]

    private ?string $id = null;

    #[ORM\Column(nullable: true)]
    protected ?string $name = null;

    #[ORM\Column(nullable: true)]
    protected ?string $gender = null;

    #[ORM\Column(nullable: true)]
    protected ?string $userNumber = null;

    #[ORM\Column]
    protected string $accountType ;


    #[ORM\Column(type: 'boolean' ,options: ['default' => 0] )]
    protected  bool $isDeleted = false;
    #[ORM\Column(type: 'datetime')]
    protected DateTime $isCreatedAt;

    #[ORM\Column(type: 'datetime' , nullable: true)]
    protected DateTime $isUpdatedAt ;

    #[ORM\Column(type: 'datetime' , nullable: true)]
    protected DateTime $isDeletedAt ;

    public function getId(): ?string
    {
        return $this->id;
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

}
