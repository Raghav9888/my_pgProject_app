<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BaseController extends AbstractController
{
    #[Route(path: '/{routeType}', name: 'app_home', requirements: ['routeType' => 'home|about|contactus'])]
    public function home(Request $request, $routeType = 'index'): Response
    {


        return $this->render('base/'. $routeType.'.html.twig', [
            'site_meta_title_name' => $routeType,
            'routeType' =>$routeType,
        ]);
    }
}