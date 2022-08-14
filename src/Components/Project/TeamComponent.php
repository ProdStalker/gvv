<?php

namespace App\Components\Project;

use App\Entity\Team;
use App\Repository\TeamRepository;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'team', template: 'components/project/team.html.twig')]
class TeamComponent
{
    public string $slug;
    private bool $shuffleMembers;

    private TeamRepository $teamRepository;
    private CacheInterface $cache;

    /**
     * @param TeamRepository $teamRepository
     * @param CacheInterface $cache
     */
    public function __construct(TeamRepository $teamRepository, CacheInterface $cache)
    {
        $this->teamRepository = $teamRepository;
        $this->cache = $cache;
    }

    public function mount(bool $isShuffleMembers = true)
    {
        $this->shuffleMembers = $isShuffleMembers;
    }

    public function getTeam(): ?Team
    {
        $cacheName = sprintf('team-%s', $this->slug);

        $team = $this->cache->get($cacheName, function(ItemInterface $item){
            $team = $this->teamRepository->findBySlug($this->slug);

            $item->expiresAfter(3600);
            if (!$team)
            {
                $item->expiresAfter(1);
            }

            return $team;
        });

        if ($team && $this->shuffleMembers)
        {
            $team->shuffleMembers();
        }

        return $team;

    }
}