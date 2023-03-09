<?php

namespace App\Service;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class RegisterHelper
{

    public function __construct(public EntityManagerInterface $em)
    {

    }


    public function setRegister($userData, $userInformation, $defaultCompany, $registerType, $user, $request): void
    {
        $date = new DateTime();

        $userInformation->setIsCreatedAt($date);

        dd($userData);
    }
}