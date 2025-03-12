<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main_home',methods: ['GET'])]
    public function home():Response
    {
     //return new Response("<h1>Accueil</h1>");
        return $this->render('main/home.html.twig');
    }

    #[Route('/test', name: 'main_test',methods: ['GET'])]
    public function test():Response
    {
        $serie = [
            "title" => "<h1>Games Of Thrones</h1>",
            "year" => 2000
        ];

       //return new Response("<h1>Test</h1>");
        return $this->render('main/test.html.twig',
        [
            "mySerie" => $serie,
            "autreVar" => 412412,
            "scriptjs" => "<script> document.location.href='http://eni-ecole.fr'; </script>"
        ]);
    }
}