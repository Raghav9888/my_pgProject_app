<?php

namespace App\Service;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class RegisterHelper
{

    public function __construct(public EntityManagerInterface $em, private readonly Session $session)
    {

    }


    public function setRegister($userData, $userInformation, $defaultCompany, $registerType, $user, $request): void
    {
        $date = new DateTime();
//        user entity
        $userData->setIsCreatedAt($date);
        $userData->setAccountType($registerType);
//        userInformation entity
        $userInformation->setIsCreatedAt($date);
        $userInformation->setAccountType($registerType);
//        DefaultCompany entity
        $defaultCompany->setAccountType($registerType);
        $defaultCompany->setTitle('Royal Reside');
        $defaultCompany->setCompanyLogo('logo.png');

        $this->session->setUserSession($user, $request);
    }
}