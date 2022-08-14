<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Team;
use App\Entity\TeamMember;
use App\Entity\TeamRole;
use DateTime;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;

/**
 * Class TeamMemberFixtures
 * @package App\DataFixtures
 */
class TeamMemberFixtures extends BaseFixtures implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     * @return mixed|void
     * @throws Exception
     */
    public function loadData(ObjectManager $manager)
    {
        $userRepository = $manager->getRepository(User::class);
        $teamRepository = $manager->getRepository(Team::class);
        $teamRoleRepository = $manager->getRepository(TeamRole::class);
        $memberComite = $teamRoleRepository->findOneBy(array('name' => 'Membre comité'));

        $teamGVV = $teamRepository->findOneBy(array('name' => 'Genève Ville Vivante'));
        $teamSP = $teamRepository->findOneBy(array('name' => 'Silent Project'));
        $teamGBPC = $teamRepository->findOneBy(array('name' => 'Geneva beer pong challenge'));
        $teamPC = $teamRepository->findOneBy(array('name' => 'Pubcrawlers.ch'));

        $userNames = array('Steve', 'Tim', 'Alex', 'Loris',
                           'Tidjan', 'Lola', 'Ben', 'Nicos',
                           'Benji', 'Steven', 'Jorge', 'Lena', 'Mickael');

        $users = array();

        foreach ($userNames as $username)
        {
            $users[$username] = $userRepository->findOneBy(array('username' => $username));
        }


        /****************************************************************************
         *                                   GVV                                    *
         ****************************************************************************/
        $teamMember = new TeamMember();
        $teamMember->setUser($users['Steve']);
        $teamMember->setStartedAt(new DateTime('01-01-2017'));
        $teamMember->setTeam($teamGVV);
        $teamMember->addRole($teamRoleRepository->findOneBy(array('name' => 'Directeur')));
        $teamMember->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable Pubcrawlers.ch')));
        $teamMember->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable GBPC')));
        $teamMember->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable Silent Project')));
        $teamMember->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable bénévoles')));
        $teamMember->addRole($teamRoleRepository->findOneBy(array('name' => 'Communication')));
        //$teamMember->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable casques')));
        $teamMember->addRole($memberComite);

        $teamMember2 = new TeamMember();
        $teamMember2->setUser($users['Tim']);
        $teamMember2->setStartedAt(new DateTime('01-01-2015'));
        $teamMember2->setTeam($teamGVV);
        $teamMember2->addRole($teamRoleRepository->findOneBy(array('name' => 'Co-fondateur')));
        $teamMember2->addRole($teamRoleRepository->findOneBy(array('name' => 'Co-président')));
        $teamMember2->addRole($memberComite);

        $teamMember3 = new TeamMember();
        $teamMember3->setUser($users['Alex']);
        $teamMember3->setStartedAt(new DateTime('01-01-2015'));
        $teamMember3->setTeam($teamGVV);
        $teamMember3->addRole($teamRoleRepository->findOneBy(array('name' => 'Co-fondateur')));
        $teamMember3->addRole($teamRoleRepository->findOneBy(array('name' => 'Co-président')));
        $teamMember3->addRole($teamRoleRepository->findOneBy(array('name' => 'Administration')));
        $teamMember3->addRole($memberComite);

        $teamMember4 = new TeamMember();
        $teamMember4->setUser($users['Loris']);
        $teamMember4->setStartedAt(new DateTime('01-01-2015'));
        $teamMember4->setTeam($teamGVV);
        $teamMember4->addRole($teamRoleRepository->findOneBy(array('name' => 'Co-fondateur')));
        $teamMember4->addRole($teamRoleRepository->findOneBy(array('name' => 'Membre d\'honneur')));
        $teamMember4->addRole($memberComite);

        $teamMember5 = new TeamMember();
        $teamMember5->setUser($users['Mickael']);
        $teamMember5->setStartedAt(new DateTime('30-01-2020'));
        $teamMember5->setTeam($teamGVV);
        $teamMember5->addRole($teamRoleRepository->findOneBy(array('name' => 'Trésorier')));
        $teamMember5->addRole($memberComite);

        $teamMember6 = new TeamMember();
        $teamMember6->setUser($users['Lola']);
        $teamMember6->setStartedAt(new DateTime('01-01-2019'));
        $teamMember6->setTeam($teamGVV);
        $teamMember6->addRole($memberComite);

        $teamMember7 = new TeamMember();
        $teamMember7->setUser($users['Ben']);
        $teamMember7->setStartedAt(new DateTime('01-01-2019'));
        $teamMember7->setTeam($teamGVV);
       // $teamMember7->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable bar')));
        $teamMember7->addRole($memberComite);

        $teamMember8 = new TeamMember();
        $teamMember8->setUser($users['Nicos']);
        $teamMember8->setStartedAt(new DateTime('01-01-2019'));
        $teamMember8->setTeam($teamGVV);
        $teamMember8->addRole($memberComite);

        $teamMember9 = new TeamMember();
        $teamMember9->setUser($users['Benji']);
        $teamMember9->setStartedAt(new DateTime('01-01-2019'));
        $teamMember9->setTeam($teamGVV);
        $teamMember9->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable son & lumière')));
        $teamMember9->addRole($memberComite);

        $teamMember10 = new TeamMember();
        $teamMember10->setUser($users['Steven']);
        $teamMember10->setStartedAt(new DateTime('01-01-2019'));
        $teamMember10->setTeam($teamGVV);
        $teamMember10->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable DJ')));

        $teamMember11 = new TeamMember();
        $teamMember11->setUser($users['Jorge']);
        $teamMember11->setStartedAt(new DateTime('01-01-2019'));
        $teamMember11->setTeam($teamGVV);
        $teamMember11->addRole($memberComite);

        $teamMember12 = new TeamMember();
        $teamMember12->setUser($users['Lena']);
        $teamMember12->setStartedAt(new DateTime('01-01-2019'));
        $teamMember12->setTeam($teamGVV);
        $teamMember12->addRole($teamRoleRepository->findOneBy(array('name' => 'Co-responsable bénévoles')));
        $teamMember12->addRole($teamRoleRepository->findOneBy(array('name' => 'Communication')));
        $teamMember12->addRole($memberComite);

        $teamMember20 = new TeamMember();
        $teamMember20->setUser($users['Tidjan']);
        $teamMember20->setStartedAt(new DateTime('30-01-2020'));
        $teamMember20->setTeam($teamGVV);
        $teamMember20->addRole($memberComite);

        /****************************************************************************
         *                             SILENT PROJECT                               *
         ****************************************************************************/
        $teamMember13 = new TeamMember();
        $teamMember13->setUser($users['Steve']);
        $teamMember13->setStartedAt(new DateTime('01-01-2019'));
        $teamMember13->setTeam($teamSP);
        $teamMember13->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable')));
        $teamMember13->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable casques')));
        $teamMember13->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable bénévoles')));

        $teamMember14 = new TeamMember();
        $teamMember14->setUser($users['Tim']);
        $teamMember14->setStartedAt(new DateTime('01-01-2016'));
        $teamMember14->setTeam($teamSP);
        $teamMember14->addRole($teamRoleRepository->findOneBy(array('name' => 'Co-Responsable')));

        $teamMember15 = new TeamMember();
        $teamMember15->setUser($users['Lena']);
        $teamMember15->setStartedAt(new DateTime('01-01-2019'));
        $teamMember15->setTeam($teamSP);
        $teamMember15->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable casques')));


        $teamMember16 = new TeamMember();
        $teamMember16->setUser($users['Ben']);
        $teamMember16->setStartedAt(new DateTime('01-01-2019'));
        $teamMember16->setTeam($teamSP);
        $teamMember16->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable bar')));

        $teamMember17 = new TeamMember();
        $teamMember17->setUser($users['Jorge']);
        $teamMember17->setStartedAt(new DateTime('01-01-2019'));
        $teamMember17->setTeam($teamSP);
        $teamMember17->addRole($teamRoleRepository->findOneBy(array('name' => 'Membre')));

        $teamMember21 = new TeamMember();
        $teamMember21->setUser($users['Benji']);
        $teamMember21->setStartedAt(new DateTime('01-01-2019'));
        $teamMember21->setTeam($teamSP);
        $teamMember21->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable son & lumière')));


        $teamMember22 = new TeamMember();
        $teamMember22->setUser($users['Steven']);
        $teamMember22->setStartedAt(new DateTime('01-01-2019'));
        $teamMember22->setTeam($teamSP);
        $teamMember22->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable DJ')));

        /****************************************************************************
         *                                  GBPC                                    *
         ****************************************************************************/
        

        $teamMember18 = new TeamMember();
        $teamMember18->setUser($users['Tim']);
        $teamMember18->setStartedAt(new DateTime('01-01-2016'));
        $teamMember18->setTeam($teamGBPC);
        $teamMember18->addRole($teamRoleRepository->findOneBy(array('name' => 'Arbitre')));

        $teamMember19 = new TeamMember();
        $teamMember19->setUser($users['Nicos']);
        $teamMember19->setStartedAt(new DateTime('01-01-2019'));
        $teamMember19->addRole($teamRoleRepository->findOneBy(array('name' => 'Membre')));
        $teamMember19->addRole($teamRoleRepository->findOneBy(array('name' => 'Arbitre')));


        $teamMember23 = new TeamMember();
        $teamMember23->setUser($users['Jorge']);
        $teamMember23->setStartedAt(new DateTime('01-01-2019'));
        $teamMember23->setTeam($teamGBPC);
        $teamMember23->addRole($teamRoleRepository->findOneBy(array('name' => 'Membre')));
        $teamMember23->addRole($teamRoleRepository->findOneBy(array('name' => 'Arbitre')));

        $teamMember24 = new TeamMember();
        $teamMember24->setUser($users['Steve']);
        $teamMember24->setStartedAt(new DateTime('01-01-2019'));
        $teamMember24->setTeam($teamGBPC);
        $teamMember24->addRole($teamRoleRepository->findOneBy(array('name' => 'Membre')));
        $teamMember24->addRole($teamRoleRepository->findOneBy(array('name' => 'Arbitre')));
        $teamMember24->addRole($teamRoleRepository->findOneBy(array('name' => 'Communication')));
        $teamMember24->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable')));

        $teamMember25 = new TeamMember();
        $teamMember25->setUser($users['Benji']);
        $teamMember25->setStartedAt(new DateTime('01-01-2019'));
        $teamMember25->setTeam($teamGBPC);
        $teamMember25->addRole($teamRoleRepository->findOneBy(array('name' => 'Membre')));
        $teamMember25->addRole($teamRoleRepository->findOneBy(array('name' => 'Arbitre')));

        /****************************************************************************
         *                                PUBCRAWL                                  *
         ****************************************************************************/
        

        $teamMember26 = new TeamMember();
        $teamMember26->setUser($users['Benji']);
        $teamMember26->setStartedAt(new DateTime('01-01-2016'));
        $teamMember26->setTeam($teamPC);
        $teamMember26->addRole($teamRoleRepository->findOneBy(array('name' => 'Guide')));

        $teamMember27 = new TeamMember();
        $teamMember27->setUser($users['Lola']);
        $teamMember27->setStartedAt(new DateTime('01-01-2019'));
        $teamMember27->setTeam($teamPC);
        $teamMember27->addRole($teamRoleRepository->findOneBy(array('name' => 'Guide')));

        $teamMember28 = new TeamMember();
        $teamMember28->setUser($users['Steve']);
        $teamMember28->setStartedAt(new DateTime('01-01-2019'));
        $teamMember28->setTeam($teamPC);
        $teamMember28->addRole($teamRoleRepository->findOneBy(array('name' => 'Guide')));
        $teamMember28->addRole($teamRoleRepository->findOneBy(array('name' => 'Responsable')));

        $teamMember29 = new TeamMember();
        $teamMember29->setUser($users['Tim']);
        $teamMember29->setStartedAt(new DateTime('01-01-2019'));
        $teamMember29->setTeam($teamPC);
        $teamMember29->addRole($teamRoleRepository->findOneBy(array('name' => 'Guide')));


        $manager->persist($teamMember);
        $manager->persist($teamMember2);
        $manager->persist($teamMember3);
        $manager->persist($teamMember4);
        $manager->persist($teamMember5);
        $manager->persist($teamMember6);
        $manager->persist($teamMember7);
        $manager->persist($teamMember8);
        $manager->persist($teamMember9);
        $manager->persist($teamMember10);
        $manager->persist($teamMember11);
        $manager->persist($teamMember12);
        $manager->persist($teamMember13);
        $manager->persist($teamMember14);
        $manager->persist($teamMember15);
        $manager->persist($teamMember16);
        $manager->persist($teamMember17);
        $manager->persist($teamMember18);
        $manager->persist($teamMember19);
        $manager->persist($teamMember20);
        $manager->persist($teamMember21);
        $manager->persist($teamMember22);
        $manager->persist($teamMember23);
        $manager->persist($teamMember24);
        $manager->persist($teamMember25);
        $manager->persist($teamMember26);
        $manager->persist($teamMember27);
        $manager->persist($teamMember28);
        $manager->persist($teamMember29);

        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return array(
            TeamFixtures::class,
            TeamRoleFixtures::class,
            UserFixtures::class
        );
    }

}
