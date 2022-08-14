<?php

namespace App\Components\Project;

use App\Entity\Team;
use App\Entity\TeamMember;
use App\Repository\TeamRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'team-member', template: 'components/project/team-member.html.twig')]
class TeamMemberComponent
{
    public TeamMember $teamMember;
}