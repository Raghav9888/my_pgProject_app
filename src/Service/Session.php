<?php
namespace App\Service;

class Session
{
    public function setCompanySession($user, $request):void
    {

    }

    public function setUserSession($user, $request):void
    {

        $request->getSession()->set('siteName', 'Royal Reside');
    }
}