<?php

namespace App\Repository;

use App\Entity\Stage;
use App\Entity\UserEleve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserEleve|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserEleve|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserEleve[]    findAll()
 * @method UserEleve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserEleveRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserEleve::class);
    }

    public function elevesSanStage($ideleve): array {

        $entityManager =$this->getEntityManager();

        $query = $entityManager->createQuery('
        SELECT nom_eleve, prenom_eleve, classe_eleve 
        FROM user_eleve')
            ->setParameter('ideleve', 10);

        return $query->execute();

    }


//    /**
//     * @return UserEleve[] Returns an array of UserEleve objects
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
    public function findOneBySomeField($value): ?UserEleve
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
