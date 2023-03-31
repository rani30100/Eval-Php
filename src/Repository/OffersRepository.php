<?php

namespace App\Repository;

use App\Entity\Offers;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Offers>
 *
 * @method Offers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offers[]    findAll()
 * @method Offers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offers::class);
    }

    public function save(Offers $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Offers $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByExampleField($criteria)
    {
        $qb = $this->createQueryBuilder('o');

        if (!empty($criteria['type'])) {
            $qb
                ->andWhere('o.type = :type')
                ->setParameter('type', $criteria['type']);
        }

        if (!empty($criteria['department'])) {
            $qb
                ->andWhere('o.department = :department')

                ->setParameter('department', $criteria['department']);
        }


        if (!empty($criteria['search'])) {
            $qb
                ->andWhere('o.Title LIKE :search')
                ->setParameter('search', '%' . $criteria['search'] . '%');
        }
        
        $date = new \DateTime("now");
        $qb->orderBy('o.id', 'DESC')

        ->andWhere('o.expiration_date > :expiration')
        ->setParameter('expiration', $date);

        return $qb->getQuery();
    }

    //  if(!empty($criteria['search'])){
    //      $qb
    //      ->andWhere('o.name LIKE :search')
    //      ->setParameter('search', '%'.$criteria ['search'].'%')
    //      ;
    //  }



    //    /**
    //     * @return Offers[] Returns an array of Offers objects
    //     */
    //    public function findByExampleField2($criteriaTri)
    //    {
    //     $qb = $this->createQueryBuilder('o');
    //        if(!empty($criteriaTri['tri'])){
    //            $qb
    //            ->andWhere('o.Title LIKE :search')
    //            ->setParameter('search', '%'.$criteriaTri ['search'].'%')
    //            ;
    //         }
    //         return $qb->getQuery();
    //     }

    //    public function findOneBySomeField($value): ?Offers
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
