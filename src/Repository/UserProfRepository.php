<?php

namespace App\Repository;

use App\Entity\UserProf;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserProf|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserProf|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserProf[]    findAll()
 * @method UserProf[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserProfRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserProf::class);
    }



//    /**
//     * @return UserProf[] Returns an array of UserProf objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserProf
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
