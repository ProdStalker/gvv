<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Persistence\ObjectManager;

/**
 * Class TeamFixtures
 * @package App\DataFixtures
 */
class TeamFixtures extends BaseFixtures
{
    /**
     * @param ObjectManager $manager
     * @return mixed|void
     */
    public function loadData(ObjectManager $manager)
    {
        $teamGVV = new Team();
        $teamGVV->setName('Genève Ville Vivante');
        $teamGVV->setShortDescription('Association mère');

        $teamPC = new Team();
        $teamPC->setName('Pubcrawlers.ch');
        $teamPC->setShortDescription('Gestion du pubcrawl');
        $teamPC->setParent($teamGVV);

        $teamGBPC = new Team();
        $teamGBPC->setName('Geneva Beer Pong Challenge');
        $teamGBPC->setShortDescription('Gestion du tournoi de Beer Pong');
        $teamGBPC->setParent($teamGVV);

        $teamSP = new Team();
        $teamSP->setName('Silent Project');
        $teamSP->setShortDescription('Gestion du Silent Project');
        $teamSP->setParent($teamGVV);

        $teamZW = new Team();
        $teamZW->setName('Zombie Walk');
        $teamZW->setShortDescription('Gestion du Zombie Walk');
        $teamZW->setParent($teamGVV);

        $teamGDJC = new Team();
        $teamGDJC->setName('Geneva DJ Contest');
        $teamGDJC->setShortDescription('Gestion du concours de DJ');
        $teamGDJC->setParent($teamGVV);

        $manager->persist($teamGVV);
        $manager->persist($teamPC);
        $manager->persist($teamGBPC);
        $manager->persist($teamSP);
        $manager->persist($teamZW);
        $manager->persist($teamGDJC);

        $manager->flush();
    }

}
