<?php

namespace App\Repository;

use App\Entity\FoodRecord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FoodRecord|null find($id, $lockMode = null, $lockVersion = null)
 * @method FoodRecord|null findOneBy(array $criteria, array $orderBy = null)
 * @method FoodRecord[]    findAll()
 * @method FoodRecord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FoodRecordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FoodRecord::class);
    }

    // /**
    //  * @return FoodRecord[] Returns an array of FoodRecord objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
