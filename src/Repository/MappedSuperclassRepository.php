<?php

namespace App\Repository;

use App\Entity\MappedSuperclass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MappedSuperclass|null find($id, $lockMode = null, $lockVersion = null)
 * @method MappedSuperclass|null findOneBy(array $criteria, array $orderBy = null)
 * @method MappedSuperclass[]    findAll()
 * @method MappedSuperclass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MappedSuperclassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MappedSuperclass::class);
    }

    // /**
    //  * @return MappedSuperclass[] Returns an array of MappedSuperclass objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MappedSuperclass
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
