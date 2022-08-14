<?php

namespace App\Components\Project;

use App\Entity\Team;
use App\Repository\TeamRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'team', template: 'components/project/team.html.twig')]
class TeamComponent
{
    public string $slug;
    private bool $shuffleMembers;
    private TeamRepository $teamRepository;

    /**
     * @param TeamRepository $teamRepository
     */
    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function mount(bool $isShuffleMembers = true)
    {
        $this->shuffleMembers = $isShuffleMembers;
    }

    public function getTeam(): ?Team
    {
        $team = $this->teamRepository->findOneBy([
            'slug' => $this->slug
        ]);

        if ($team && $this->shuffleMembers)
        {
           $team->shuffleMembers();
        }

        return $team;
    }
}