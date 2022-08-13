<?php

namespace App\Components\Header;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'header-title-subtitle', template: 'components/header/header-title-subtitle.html.twig')]
class HeaderTitleSubtitle
{
    /**
     * @var string
     */
    public string $title;

    /**
     * @var string
     */
    public string $subtitle;

}