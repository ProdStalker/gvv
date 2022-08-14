<?php

namespace App\Service\Managers;

use App\Entity\HeaderBanner;
use App\Repository\HeaderBannerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class HeaderBannerManager
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

    public function findBySlug(string $slug): ?HeaderBanner
    {
        $cacheName = sprintf('header-banner-%s', $slug);

        return $this->cache->get($cacheName, function(ItemInterface $item) use ($slug) {
            $headerBanner = $this->getRepository()->findOneBySlug($slug);

            $item->expiresAfter(3600);
            if (!$headerBanner)
            {
                $item->expiresAfter(1);
            }

            return $headerBanner;
        });
    }

    private function getRepository(): HeaderBannerRepository
    {
        return $this->entityManager->getRepository(HeaderBanner::class);
    }
}