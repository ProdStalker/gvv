<?php

namespace App\Components\Project;

use App\Entity\Team;
use App\Service\Managers\TeamManager;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'team', template: 'components/project/team.html.twig')]
class TeamComponent
{
    public string $slug;
    private bool $shuffleMembers;

    private TeamManager $teamManager;

    /**
     * @param TeamManager $teamManager
     */
    public function __construct(TeamManager $teamManager)
    {
        $this->teamManager = $teamManager;
    }

    public function mount(bool $isShuffleMembers = true)
    {
        $this->shuffleMembers = $isShuffleMembers;
    }

    public function getTeam(): ?Team
    {
        $team = $this->teamManager->findBySlug($this->slug);

        if ($team && $this->shuffleMembers)
        {
            $team->shuffleMembers();
        }

        return $team;

    }
}