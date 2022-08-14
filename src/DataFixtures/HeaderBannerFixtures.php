<?php

namespace App\DataFixtures;

use App\Entity\HeaderBanner;
use Doctrine\Persistence\ObjectManager;

/**
 * Class TeamRoleFixtures
 * @package App\DataFixtures
 */
class HeaderBannerFixtures extends BaseFixtures
{
    /**
     * @param ObjectManager $manager
     * @return mixed|void
     */
    public function loadData(ObjectManager $manager)
    {
        $headerBannerGVV = (new HeaderBanner())->setTitle('Genève Ville Vivante')
            ->setImageUrl('https://geneve-ville-vivante.ch/img/banners/home.jpg')
            ->setSlug('gvv');

        $manager->persist($headerBannerGVV);

        $manager->flush();
    }

}
