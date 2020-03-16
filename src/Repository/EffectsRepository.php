<?php

namespace App\Repository;

use App\Entity\Effects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Effects|null find($id, $lockMode = null, $lockVersion = null)
 * @method Effects|null findOneBy(array $criteria, array $orderBy = null)
 * @method Effects[]    findAll()
 * @method Effects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EffectsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Effects::class);
    }

    // /**
    //  * @return Effects[] Returns an array of Effects objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Effects
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
