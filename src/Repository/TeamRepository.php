<?php

namespace App\Repository;

use App\Entity\Team;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Team>
 *
 * @method Team|null find($id, $lockMode = null, $lockVersion = null)
 * @method Team|null findOneBy(array $criteria, array $orderBy = null)
 * @method Team[]    findAll()
 * @method Team[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Team::class);
    }

    public function add(Team $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Team $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findBySlug(string $slug)
    {
        return $this->createQueryBuilder('t')
            ->addSelect('t')
            ->innerJoin('t.teamMembers', 'tm')
                ->addSelect('tm')
            ->innerJoin('tm.user', 'tmu')
                ->addSelect('tmu')
            ->innerJoin('tm.roles', 'tmr')
                ->addSelect('tmr')
            ->where('t.slug = :slug')
                ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
