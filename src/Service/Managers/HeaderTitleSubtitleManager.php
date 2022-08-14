<?php

namespace App\Service\Managers;

use App\Entity\HeaderTitleSubtitle;
use App\Repository\HeaderTitleSubtitleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class HeaderTitleSubtitleManager
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

    public function findBySlug(string $slug): ?HeaderTitleSubtitle
    {
        $cacheName = sprintf('header-title-subtitle-%s', $slug);

        return $this->cache->get($cacheName, function(ItemInterface $item) use ($slug) {
            $headerTitleSubtitle = $this->getRepository()->findOneBySlug($slug);

            $item->expiresAfter(3600);
            if (!$headerTitleSubtitle)
            {
                $item->expiresAfter(1);
            }

            return $headerTitleSubtitle;
        });
    }

    private function getRepository(): HeaderTitleSubtitleRepository
    {
        return $this->entityManager->getRepository(HeaderTitleSubtitle::class);
    }
}