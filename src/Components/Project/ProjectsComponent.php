<?php

namespace App\Components\Project;

use App\Service\Managers\ProjectManager;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'projects', template: 'components/project/projects.html.twig')]
class ProjectsComponent
{
    private ProjectManager $projectManager;

    private bool $forHome;
    private bool $needShuffle;

    /**
     * @param ProjectManager $projectManager
     */
    public function __construct(ProjectManager $projectManager)
    {
        $this->projectManager = $projectManager;
    }

    public function mount(bool $isNeedShuffle = true, bool $isForHome = false)
    {
        $this->needShuffle = $isNeedShuffle;
        $this->forHome = $isForHome;
    }

    public function getProjects(): array
    {
        $projects = [];
        if (!$this->forHome)
        {
            $projects = $this->projectManager->findAll();
        }
        else
        {
            $projects = $this->projectManager->findProjectsForHome();
        }

        if ($this->needShuffle)
        {
            shuffle($projects);
        }

        return $projects;
    }
}