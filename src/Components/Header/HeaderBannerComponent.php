<?php

namespace App\Components\Header;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'header-banner', template: 'components/header/header-banner.html.twig')]
class HeaderBannerComponent
{
    /**
     * @var string
     */
    public string $title;

    /**
     * @var string
     */
    public string $imageUrl = 'https://via.placeholder.com/1920x200';

    public function mount()
    {
        $this->imageUrl = $this->imageUrl ?: 'https://via.placeholder.com/1920x200';
    }
}