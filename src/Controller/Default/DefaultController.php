<?php

namespace App\Controller\Default;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/bootboxHelper', name: 'app_helper')]
    public function bootboxHelper(): Response
    {

        return $this->render('default/bootbox/registerHelper.html.twig');
    }
}