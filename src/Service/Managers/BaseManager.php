<?php

namespace App\Service\Managers;

class BaseManager
{
    protected int $cacheDuration;

    public function __construct(int $cacheDuration)
    {
        $this->cacheDuration = $cacheDuration;
    }
}