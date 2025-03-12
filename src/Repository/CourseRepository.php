<?php

namespace App\Repository;

use App\Entity\Course;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Course>
 */
class CourseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Course::class);
    }

    /**
     * Fonction en charge de retourner la liste des 5 derniers cours
     * dont la durée est supérieur à 2 jours par défaut ou en lui passant le nombre de jours.
     * @param int $duration durée en jours
     * @return array
     */
    public function findLastCourses(int $duration = 2):array{
        //En DQL
        /*$entityManager = $this->getEntityManager();
        $dql = "SELECT c
                FROM App\Entity\Course c
                WHERE c.duration > :duration
                ORDER BY c.dateCreated DESC";

        $query = $entityManager->createQuery($dql);
        $query->setParameter('duration',$duration);
        $query->setMaxResults(5);*/

        //EN QueryBuilder
        $queryBuilder = $this->createQueryBuilder('c')
            ->andWhere('c.duration > :duration')
            ->addOrderBy('c.dateCreated','DESC')
            ->setParameter('duration',$duration)
            ->setMaxResults(5);
        $query = $queryBuilder->getQuery();

        return $query->getResult();
    }

    //    /**
    //     * @return Course[] Returns an array of Course objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Course
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
