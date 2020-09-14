<?php

namespace App\Repository;

use App\Entity\ExtendedInformation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExtendedInformation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExtendedInformation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExtendedInformation[]    findAll()
 * @method ExtendedInformation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExtendedInformationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExtendedInformation::class);
    }

    // /**
    //  * @return ExtendedInformation[] Returns an array of ExtendedInformation objects
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
    public function findOneBySomeField($value): ?ExtendedInformation
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
