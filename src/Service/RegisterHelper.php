<?php

namespace App\Service;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class RegisterHelper
{

    public function __construct(public EntityManagerInterface $em, private readonly Session $session)
    {

    }

    public function registerCompany($userData, $ownerInformation, $user, $request): void
    {
        $date = new DateTime();
        $userData->setIsCreatedAt($date);

        $this->session->setCompanySession($user, $request);
    }

    public function registerUser($userData, $userInformation, $user, $request): void
    {
        $date = new DateTime();
//        user entity
        $userData->setIsCreatedAt($date);

//        userInformation entity
        $userInformation->setIsCreatedAt($userData->getIsCreatedAt());


        $this->session->setUserSession($user, $request);
    }
}