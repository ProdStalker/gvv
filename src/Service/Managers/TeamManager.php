<?php

namespace App\Service\Managers;

use App\Entity\Team;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class TeamManager
{
    private CacheInterface $cache;
    private EntityManagerInterface $entityManager;

    /**
     * @param CacheInterface $cache
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(CacheInterface $cache, EntityManagerInterface $entityManager)
    {
        $this->cache = $cache;
        $this->entityManager = $entityManager;
    }

    public function findBySlug(string $slug): ?Team
    {
        $cacheName = sprintf('team-%s', $slug);

        return $this->cache->get($cacheName, function(ItemInterface $item) use ($slug) {
            $team = $this->getRepository()->findBySlug($slug);

            $item->expiresAfter(3600);
            if (!$team)
            {
                $item->expiresAfter(1);
            }

            return $team;
        });
    }

    private function getRepository(): TeamRepository
    {
        return $this->entityManager->getRepository(Team::class);
    }
}