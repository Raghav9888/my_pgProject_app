<?php

namespace App\Service;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class RegisterHelper
{

    public function __construct(public EntityManagerInterface $em, private readonly Session $session)
    {

    }

    public function registerCompany($formData, $user, $request): void
    {
        $date = new DateTime();
        $formData->setIsCreatedAt($date);

        $this->session->setCompanySession($user, $request);
    }

    public function registerUser($formData, $user, $request): void
    {
        $date = new DateTime();
        $formData->setIsCreatedAt($date);


        $this->session->setUserSession($user, $request);
    }
}