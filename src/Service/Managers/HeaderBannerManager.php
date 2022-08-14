<?php

namespace App\Service\Managers;

use App\Entity\HeaderBanner;
use App\Repository\HeaderBannerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class HeaderBannerManager extends BaseManager
{
    private CacheInterface $cache;
    private EntityManagerInterface $entityManager;

    /**
     * @param CacheInterface $cache
     * @param EntityManagerInterface $entityManager
     * @param int $cacheDuration
     */
    public function __construct(CacheInterface $cache, EntityManagerInterface $entityManager, int $cacheDuration)
    {
        parent::__construct($cacheDuration);

        $this->cache = $cache;
        $this->entityManager = $entityManager;
    }

    public function findBySlug(string $slug): ?HeaderBanner
    {
        $cacheName = sprintf('header-banner-%s', $slug);

        return $this->cache->get($cacheName, function(ItemInterface $item) use ($slug) {
            $headerBanner = $this->getRepository()->findOneBySlug($slug);

            $item->expiresAfter($this->cacheDuration);
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