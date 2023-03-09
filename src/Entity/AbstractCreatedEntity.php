<?php


namespace App\Entity;


use DateTime;
use Doctrine\ORM\Mapping as ORM;

class AbstractCreatedEntity
{
    #[ORM\Column(type: 'datetime')]
    private DateTime $isCreated ;

}