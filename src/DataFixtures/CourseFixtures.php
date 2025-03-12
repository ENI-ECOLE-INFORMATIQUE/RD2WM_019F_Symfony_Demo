<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CourseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        //Création d'un cours
        $course = new Course();
        $course->setName('Symfony');
        $course->setContent('Le développement web côté serveur (avec Symfony)');
        $course->setDuration(10);
        $course->setDateCreated(new \DateTimeImmutable('2025-02-01'));
        $course->setPublished(true);
        $manager->persist($course);

        $course = new Course();
        $course->setName('PHP');
        $course->setContent('Le développement web côté serveur (avec PHP)');
        $course->setDuration(5);
        $course->setDateCreated(new \DateTimeImmutable('2025-01-01'));
        $course->setPublished(true);
        $manager->persist($course);

        $course = new Course();
        $course->setName('Apache');
        $course->setContent('Administration d\'un serveur Apache sous Linux');
        $course->setDuration(5);
        $course->setDateCreated(new \DateTimeImmutable('2024-01-01'));
        $course->setPublished(true);
        $manager->persist($course);

        //On va paramétrer faker pour qu'il utilise des datas en français.
        $faker = \Faker\Factory::create('fr_FR');

        //Création de 30 Cours Supplémentaire
        for($i=1;$i<=30;$i++){
            $course = new Course();
            $course->setName($faker->word());
            $course->setContent($faker->realText);
            $course->setDuration(mt_rand(1,10));
            $dateCreated=$faker->dateTimeBetween('-2 months','now');
            $course->setDateCreated(\DateTimeImmutable::createFromMutable($dateCreated));
            $dateModified = $faker->dateTimeBetween($course->getDateCreated()->format('Y-m-d'),'now');
            $course->setDateModified(\DateTimeImmutable::createFromMutable($dateModified));
            $course->setPublished(false);
            $manager->persist($course);
        }


        //Création de 30 Cours Supplémentaire
/*        for($i=1;$i<=30;$i++){
            $course = new Course();
            $course->setName("Cours $i");
            $course->setContent("Description du cours $i");
            $course->setDuration(mt_rand(1,10));
            $course->setDateCreated(new \DateTimeImmutable());
            $course->setPublished(false);
            $manager->persist($course);
        }*/

        $manager->flush();
    }
}
