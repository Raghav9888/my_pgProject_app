<?php

namespace App\Service;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class RegisterHelper
{

    public function __construct(public EntityManagerInterface $em, private readonly Session $session)
    {

    }

    public function registerCompany($userData,$registerType, $user, $request): void
    {
        $date = new DateTime();
        $userData->setIsCreatedAt($date);

        $this->session->setCompanySession($user, $request);
    }

    public function registerUser($userData,$registerType, $user, $request): void
    {
        $date = new DateTime();
//        user entity
        $userData->setIsCreatedAt($date);
        $userData->setAccountType($registerType);

//        userInformation entity
       $userInformation = $userData->getUserInformation();
        $userInformation->setIsCreatedAt($userData->getIsCreatedAt());
        $userInformation->setAccountType($registerType);



        $this->session->setUserSession($user, $request);
    }
}