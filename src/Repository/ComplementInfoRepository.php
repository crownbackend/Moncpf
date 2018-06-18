<?php

namespace App\Repository;

use App\Entity\ComplementInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ComplementInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ComplementInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ComplementInfo[]    findAll()
 * @method ComplementInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComplementInfoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ComplementInfo::class);
    }

    /*
    public function findOneBySomeField($value): ?ComplementInfo
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
