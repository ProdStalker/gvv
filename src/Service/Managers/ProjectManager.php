<?php

namespace App\Service\Managers;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class ProjectManager extends BaseManager
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

    public function findAll(): array
    {
        $cacheName = 'projects';
        return $this->cache->get($cacheName, function(ItemInterface $item){
            $projects = $this->getRepository()->findAll();

            $item->expiresAfter($this->cacheDuration);

            if (!$projects || empty($projects))
            {
                $item->expiresAfter(1);
            }

            return $projects;
        });
    }

    public function findBySlug(string $slug): ?Project
    {
        $cacheName = sprintf('project-%s', $slug);

        return $this->cache->get($cacheName, function(ItemInterface $item) use ($slug) {
            $project = $this->getRepository()->findBySlug($slug);

            $item->expiresAfter($this->cacheDuration);
            if (!$project)
            {
                $item->expiresAfter(1);
            }

            return $project;
        });
    }

    public function findProjectsForHome(): array
    {
        $cacheName = 'projects-for-home';
        return $this->cache->get($cacheName, function(ItemInterface $item){
            $projects = $this->getRepository()->findBy([
                'isShowHome' => true
            ]);;

            $item->expiresAfter($this->cacheDuration);

            if (!$projects || empty($projects))
            {
                $item->expiresAfter(1);
            }

            return $projects;
        });
    }

    private function getRepository(): ProjectRepository
    {

        return $this->entityManager->getRepository(Project::class);
    }
}