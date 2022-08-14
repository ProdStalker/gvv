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
        $cacheName = sprintf('project-%s', $slug);

        return $this->cache->get($cacheName, function(ItemInterface $item) use ($slug) {
            $project = $this->getRepository()->findBySlug($slug);

            $item->expiresAfter(3600);
            if (!$project)
            {
                $item->expiresAfter(1);
            }

            return $project;
        });
    }

    private function getRepository(): TeamRepository
    {
        return $this->entityManager->getRepository(Team::class);
    }
}