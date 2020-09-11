<?php

namespace App\Repository;

use App\Entity\OtherChild;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OtherChild|null find($id, $lockMode = null, $lockVersion = null)
 * @method OtherChild|null findOneBy(array $criteria, array $orderBy = null)
 * @method OtherChild[]    findAll()
 * @method OtherChild[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OtherChildRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OtherChild::class);
    }

    // /**
    //  * @return OtherChild[] Returns an array of OtherChild objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OtherChild
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
