<?php

namespace App\DataFixtures;

use App\Entity\TeamRole;
use Doctrine\Persistence\ObjectManager;

/**
 * Class TeamRoleFixtures
 * @package App\DataFixtures
 */
class TeamRoleFixtures extends BaseFixtures
{
    /**
     * @param ObjectManager $manager
     * @return mixed|void
     */
    public function loadData(ObjectManager $manager)
    {
        $teamRole = new TeamRole();
        $teamRole->setName('Membre');
        $teamRole->setShortDescription('Membre');

        $teamRole2 = new TeamRole();
        $teamRole2->setName('Responsable');
        $teamRole2->setShortDescription('Responsable de l\'équipe et du projet');

        $teamRole3 = new TeamRole();
        $teamRole3->setName('Co-responsable');
        $teamRole3->setShortDescription('Aide le/la responsable de l\'équipe et du projet');

        $teamRole4 = new TeamRole();
        $teamRole4->setName('Communication');
        $teamRole4->setShortDescription('Gère la communication pour le projet');

        $teamRole5 = new TeamRole();
        $teamRole5->setName('Trésorier');
        $teamRole5->setShortDescription('Gère l\'aspect financier du projet');

        $teamRole6 = new TeamRole();
        $teamRole6->setName('Fondateur');
        $teamRole6->setShortDescription('Fondateur du projet');

        $teamRole7 = new TeamRole();
        $teamRole7->setName('Co-fondateur');
        $teamRole7->setShortDescription('Co-fondateur du projet');

        $teamRole8 = new TeamRole();
        $teamRole8->setName('Directeur');
        $teamRole8->setShortDescription('Directeur du projet');

        $teamRole9 = new TeamRole();
        $teamRole9->setName('Président');
        $teamRole9->setShortDescription('Président du projet');

        $teamRole10 = new TeamRole();
        $teamRole10->setName('Co-président');
        $teamRole10->setShortDescription('Co-président du projet');

        $teamRole11 = new TeamRole();
        $teamRole11->setName('Responsable bénévoles');
        $teamRole11->setShortDescription('Responsable des bénévoles');

        $teamRole12 = new TeamRole();
        $teamRole12->setName('Co-responsable bénévoles');
        $teamRole12->setShortDescription('Co-responsable des bénévoles');

        $teamRole13 = new TeamRole();
        $teamRole13->setName('Membre comité');
        $teamRole13->setShortDescription('Membre du comité');

        $teamRole14 = new TeamRole();
        $teamRole14->setName('Responsable DJ');
        $teamRole14->setShortDescription('Responsable DJ');

        $teamRole15 = new TeamRole();
        $teamRole15->setName('Administration');
        $teamRole15->setShortDescription('Administration');

        $teamRole16 = new TeamRole();
        $teamRole16->setName('Responsable Stock');
        $teamRole16->setShortDescription('Responsable stock');

        $teamRole17 = new TeamRole();
        $teamRole17->setName('Responsable Bar');
        $teamRole17->setShortDescription('Responsable bar');

        $teamRole18 = new TeamRole();
        $teamRole18->setName('Responsable Casques');
        $teamRole18->setShortDescription('Responsable casques');

        $teamRole19 = new TeamRole();
        $teamRole19->setName('Responsable GBPC');
        $teamRole19->setShortDescription('Responsable Geneva Beer Pong Challenge');

        $teamRole20 = new TeamRole();
        $teamRole20->setName('Responsable Pubcrawlers.ch');
        $teamRole20->setShortDescription('Responsable Pubcrawlers.ch');

        $teamRole21 = new TeamRole();
        $teamRole21->setName('Responsable son & lumière');
        $teamRole21->setShortDescription('Responsable son & lumière');

        $teamRole22 = new TeamRole();
        $teamRole22->setName('Guide');
        $teamRole22->setShortDescription('Guide');

        $teamRole23 = new TeamRole();
        $teamRole23->setName('Arbitre');
        $teamRole23->setShortDescription('Arbitre');

        $teamRole24 = new TeamRole();
        $teamRole24->setName('Membre d\'honneur');
        $teamRole24->setShortDescription('Membre d\'honneur');

        $teamRole25 = new TeamRole();
        $teamRole25->setName('Responsable Silent Project');
        $teamRole25->setShortDescription('Responsable Silent Project');

        $teamRole26 = new TeamRole();
        $teamRole26->setName('Directeur');
        $teamRole26->setShortDescription('Directeur');

        $manager->persist($teamRole);
        $manager->persist($teamRole2);
        $manager->persist($teamRole3);
        $manager->persist($teamRole4);
        $manager->persist($teamRole5);
        $manager->persist($teamRole6);
        $manager->persist($teamRole7);
        $manager->persist($teamRole8);
        $manager->persist($teamRole9);
        $manager->persist($teamRole10);
        $manager->persist($teamRole11);
        $manager->persist($teamRole12);
        $manager->persist($teamRole13);
        $manager->persist($teamRole14);
        $manager->persist($teamRole15);
        $manager->persist($teamRole16);
        $manager->persist($teamRole17);
        $manager->persist($teamRole18);
        $manager->persist($teamRole19);
        $manager->persist($teamRole20);
        $manager->persist($teamRole21);
        $manager->persist($teamRole22);
        $manager->persist($teamRole23);
        $manager->persist($teamRole24);
        $manager->persist($teamRole25);
        $manager->persist($teamRole26);


        $manager->flush();
    }

}
