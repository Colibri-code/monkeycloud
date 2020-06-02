<?php

namespace App\Repository;

use App\Entity\TimeZone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TimeZone|null find($id, $lockMode = null, $lockVersion = null)
 * @method TimeZone|null findOneBy(array $criteria, array $orderBy = null)
 * @method TimeZone[]    findAll()
 * @method TimeZone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimeZoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TimeZone::class);
    }

    // /**
    //  * @return TimeZone[] Returns an array of TimeZone objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TimeZone
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
