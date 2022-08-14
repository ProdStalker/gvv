<?php

namespace App\DataFixtures;

use App\Entity\HeaderTitleSubtitle;
use Doctrine\Persistence\ObjectManager;

/**
 * Class TeamRoleFixtures
 * @package App\DataFixtures
 */
class HeaderTitleSubtitleFixtures extends BaseFixtures
{
    /**
     * @param ObjectManager $manager
     * @return mixed|void
     */
    public function loadData(ObjectManager $manager)
    {
        $headerTitleSubtitles = [
            [
                'title' => 'Be GVV',
                'subtitle' => 'Une Genève qui rit, qui bouge, qui vit',
                'slug' => 'be-gvv'
            ],
            [
                'title' => 'La team',
                'subtitle' => 'Cerveaux en ébullitions',
                'slug' => 'home-la-team'
            ],
        ];

        foreach($headerTitleSubtitles as $headerTitleSubtitleData)
        {
            $headerTitleSubtitle = (new HeaderTitleSubtitle())->setTitle($headerTitleSubtitleData['title'])
                ->setSubtitle($headerTitleSubtitleData['subtitle'])
                ->setSlug($headerTitleSubtitleData['slug']);

            $manager->persist($headerTitleSubtitle);
        }

        $manager->flush();
    }

}
