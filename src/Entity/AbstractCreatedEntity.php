<?php


namespace App\Entity;


use DateTime;
use Doctrine\ORM\Mapping as ORM;
#[ORM\MappedSuperclass]
#[ORM\HasLifecycleCallbacks]
abstract class AbstractCreatedEntity
{
    #[ORM\Column(type: 'boolean' ,options: ['default' => 0] )]
    private  bool $isDeleted = false;
    #[ORM\Column(type: 'datetime')]
    private DateTime $isCreatedAt;

    #[ORM\Column(type: 'datetime' , nullable: true)]
    private DateTime $isUpdatedAt ;

    #[ORM\Column(type: 'datetime' , nullable: true)]
    private DateTime $isDeletedAt ;

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


}