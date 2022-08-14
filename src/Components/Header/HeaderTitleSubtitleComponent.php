<?php

namespace App\Components\Header;

use App\Entity\HeaderTitleSubtitle;
use App\Service\Managers\HeaderTitleSubtitleManager;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'header-title-subtitle', template: 'components/header/header-title-subtitle.html.twig')]
class HeaderTitleSubtitleComponent
{
    public string $slug;

    private HeaderTitleSubtitleManager $headerTitleSubtitleManager;

    /**
     * @param HeaderTitleSubtitleManager $headerTitleSubtitleManager
     */
    public function __construct(HeaderTitleSubtitleManager $headerTitleSubtitleManager)
    {
        $this->headerTitleSubtitleManager = $headerTitleSubtitleManager;
    }

    public function getHeaderTitleSubtitle(): ?HeaderTitleSubtitle
    {
        return $this->headerTitleSubtitleManager->findBySlug($this->slug);
    }
}