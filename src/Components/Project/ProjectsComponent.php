<?php

namespace App\Components\Project;

use App\Repository\ProjectRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'projects', template: 'components/project/projects.html.twig')]
class ProjectsComponent
{
    private ProjectRepository $projectRepository;

    private $forHome;

    /**
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function mount(bool $isForHome = false)
    {
        $this->forHome = $isForHome;
    }

    public function getProjects(): array
    {
        if (!$this->forHome)
        {
            return $this->projectRepository->findAll();
        }
        else
        {
            return $this->projectRepository->findBy([
                'isShowHome' => true
            ]);
        }
    }
}