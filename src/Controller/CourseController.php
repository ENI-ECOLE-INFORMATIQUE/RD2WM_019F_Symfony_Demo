<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cours', name: 'cours_')]
class CourseController extends AbstractController
{
    #[Route('/', name: 'list',methods: ['GET'])]
    public function list(): Response
    {
        //TODO Récupére tous les cours en BDD
        return $this->render('course/list.html.twig');
    }

    #[Route('/{id}', name: 'show',requirements: ['id'=>'\d+'],methods: ['GET'])]
    public function show(int $id): Response
    {
        //TODO Récupére le cours en BDD en fonction de son id
        return $this->render('course/show.html.twig');
    }

    #[Route('/ajouter', name: 'create',methods: ['GET','POST'])]
    public function create(Request $request): Response
    {
        //dd($request);
        dump($request);
        //TODO création du cours
        return $this->render('course/create.html.twig');
    }

    #[Route('/{id}/modifier', name: 'edit',requirements: ['id'=>'\d+'], methods: ['GET','POST'])]
    public function edit(int $id): Response
    {
        //TODO Rechercher le cours dans la bdd d'apres l'id pour pouvoir le modifier
        return $this->render('course/edit.html.twig');
    }
}
