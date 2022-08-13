<?php

namespace App\Components\Media;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'image-title-description', template: 'components/media/image-title-description.html.twig')]
class ImageTitleDescription
{
    /**
     * @var string
     */
    public string $imageUrl = 'https://via.placeholder.com/50x50';

    /**
     * @var string
     */
    public string $color = '#eaeaea';

    /**
     * @var string
     */
    public string $title;

    /**
     * @var bool
     */
    public bool $titleUppercase;

    /**
     * @var string
     */
    public string $description;

    public function mount(bool $isTitleUppercase = true)
    {
        $this->imageUrl = $this->imageUrl ?: 'https://via.placeholder.com/50x50';
        $this->color = $this->color ?: '#eaeaea';
        $this->titleUppercase = $isTitleUppercase;
    }
}