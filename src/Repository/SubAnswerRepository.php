<?php

namespace App\Repository;

use App\Entity\SubAnswer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SubAnswer|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubAnswer|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubAnswer[]    findAll()
 * @method SubAnswer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubAnswerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SubAnswer::class);
    }

    // /**
    //  * @return SubAnswer[] Returns an array of SubAnswer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SubAnswer
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
