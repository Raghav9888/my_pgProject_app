<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BaseController extends AbstractController
{
    #[Route(path: '/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
            'currentRoute' => 'index'
        ]);
    }

    #[Route(path: '/{routeType}', name: 'app_home', requirements: ['routeType' => 'home|about|contactus'])]
    public function home(Request $request, $routeType): Response
    {

        return $this->render('base/' . $routeType . '.html.twig', [
            'currentRoute'=> $routeType,
            'site_meta_title_name' => $routeType,
            'routeType' => $routeType,
        ]);
    }
}