<?php

namespace App\Repository;

use App\Entity\HeaderTitleSubtitle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HeaderTitleSubtitle>
 *
 * @method HeaderTitleSubtitle|null find($id, $lockMode = null, $lockVersion = null)
 * @method HeaderTitleSubtitle|null findOneBy(array $criteria, array $orderBy = null)
 * @method HeaderTitleSubtitle[]    findAll()
 * @method HeaderTitleSubtitle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeaderTitleSubtitleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HeaderTitleSubtitle::class);
    }

    public function add(HeaderTitleSubtitle $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(HeaderTitleSubtitle $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return HeaderTitleDescription[] Returns an array of HeaderTitleDescription objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?HeaderTitleDescription
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
