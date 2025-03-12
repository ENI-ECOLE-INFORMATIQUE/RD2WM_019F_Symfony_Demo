<?php

namespace App\Controller;

use App\Entity\Course;
use App\Repository\CourseRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cours', name: 'cours_')]
class CourseController extends AbstractController
{
    #[Route('/', name: 'list',methods: ['GET'])]
    public function list(CourseRepository $courseRepository): Response
    {
        //Récupére tous les cours en BDD
        $courses = $courseRepository->findAll();
        return $this->render('course/list.html.twig',['courses'=>$courses]);
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

    #[Route('/demo', name: 'demo',methods: ['GET'])]
    public function demo(EntityManagerInterface $em ): Response
    {
       //Créer une instance de l'entité
        $course = new Course();
        //hydrater toutes les propriétés
        $course->setName('Symfony');
        $course->setContent('Le développement web côté serveur (avec Symfony)');
        $course->setDuration(10);
        $course->setDateCreated(new \DateTimeImmutable());
        $course->setPublished(true);

        //Enregistrer l'objet en BD
        $em->persist($course);
        dump($course);

        //Je modifie l'objet cours
        $course->setName('PHP');
        $em->flush();
        dump($course);

        //Suppression de l'objet
        $em->remove($course);
        $em->flush();

        return $this->render('course/create.html.twig');
    }

    #[Route('/{id}/modifier', name: 'edit',requirements: ['id'=>'\d+'], methods: ['GET','POST'])]
    public function edit(int $id): Response
    {
        //TODO Rechercher le cours dans la bdd d'apres l'id pour pouvoir le modifier
        return $this->render('course/edit.html.twig');
    }
}
