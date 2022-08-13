<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $projects = new ArrayCollection();

        $projectGVV = new Project();
        $projectGVV->setName('Genève Ville Vivante');
        $projectGVV->setShortDescription('Association mère');
        //$projectGVV->setColor(str_replace('#','', $this->faker->hexcolor));
        $projectGVV->setColor('183230');
        $projectGVV->setImageName('5e53fd4e7ab02555929856.png');
        $projectGVV->setAcronym('GVV');
        $projectGVV->setDescription('

<b>GENÈVE | VILLE | VIVANTE</b>

Genève Ville Vivante est une jeune association crée en 2013 visant à rendre Genève toujours un peu plus vivante et plus intéressante. A ces fins, les membres créent et organisent différents concepts permettant d’étoffer l’offre de la vie culturelle genevoise.

Avant tout axé sur la vie nocturne et sa culture, Genève Ville Vivante essaie via ses événements de rapprocher les différents milieux socio-culturelles, permettre la rencontre, proposer des nouveautés, offrir le sourire au noctambule, qu’il soit de passage ou réside dans notre belle ville.

Intéressé par l’événementiel? La vie et la culture nocturne genevoise? Envie de faire bouger les choses (et Genève)? N’hésite pas à nous écrire si l’envie de nous rejoindre te tiraille!

La Team GVV
');

        $projectGVV->setVisible(true);
        $projectGVV->setShowHome(false);


        /*$repository = $manager->getRepository(Translation::class);
        $repository->translate($projectGVV, 'shortDescription', 'fr', 'Association mère')
                   ->translate($projectGVV, 'shortDescription', 'en', 'Mother association');*/

        $projectSP = new Project();
        $projectSP->setName('Silent Project');
        $projectSP->setShortDescription('Shake sur les meilleurs sons, dans des lieux aussi improbables que magiques. Le tout en silence.');
        $projectSP->setDescription('Danser dans un musée, pogoter dans une église, shaker au milieu de la forêt, twerker dans un entrepôt … Le Silent Project n’a pas de limite! Quatres fois par an, nous te proposons de vivre, le temps d’une soirée, une expérience aussi bluffante que délirante!

            Spots visités:

            Cour de l’hôtel de Ville – Gare de Genève-Sécheron – Temple de Plainpalais
Skatepark de Plainpalais – Parc Mon Repos – Cour de Calvin – Barje – Cour de Saint-Pierre et bien d’autres

Allier le fun et la liberté d’une silent party te permettant de choisir en permanence parmi 3 styles musicaux dans ton casque, à l’originalité d’un lieu initialement prévu à une tout autre activité. C’est là tout le principe du Silent Project.

Le Silent Project, c’est des soirées qui sortent de l’ordinaire, dans des lieux impensables et improbables, dont l’entrée est libre!
Pour chaque épisode, un thème lié au lieu visité est mis en avant par des partenaires locaux.

Casques 3 canaux
12 DJs
Bar
Food truck
Stands partenaires

<b>____    Parce que Genève en a besoin!    ____</b>');
        //$projectSP->setColor(str_replace('#','', $this->faker->hexcolor));
        $projectSP->setColor('fc6d6d');
        $projectSP->setImageName('5e53fd7a9fc79049489377.jpg');
        $projectSP->setParent($projectGVV);
        $projectSP->setVisible(true);
        $projectSP->setShowHome(true);

        $projectGDJC = new Project();
        $projectGDJC->setName('Geneva DJ Contest');
        $projectGDJC->setShortDescription('Confronte ton talent aux platines. Le tout face au meilleur des jury, le public.');
        //$projectGDJC->setColor(str_replace('#','', $this->faker->hexcolor));
        $projectGDJC->setColor('34d293');
        $projectGDJC->setImageName('5e53fd4225b6c435859056.jpg');
        $projectGDJC->setParent($projectGVV);
        $projectGDJC->setVisible(true);
        $projectGDJC->setShowHome(true);

        $projectZW = new Project();
        $projectZW->setName('Zombie Walk');
        $projectZW->setShortDescription('Déambule le temps d’une soirée. Le tout de manière sanglante');
        //$projectZW->setColor(str_replace('#','', $this->faker->hexcolor));
        $projectZW->setColor('3ab0e2');
        $projectZW->setImageName('5e53fd851ffc0366772287.jpg');
        $projectZW->setParent($projectGVV);
        $projectZW->setVisible(false);
        $projectZW->setShowHome(false);

        $projectGBPC = new Project();
        $projectGBPC->setName('Geneva Beer Pong Challenge');
        $projectGBPC->setShortDescription('Affronte les meilleurs joueurs de la région. Le tout en visant au plus juste.');
        $projectGBPC->setAcronym('GBPC');
        $projectGBPC->setDescription('GBPC 2019 terminé. Bravos à tous.  

GENEVA BEER PONG CHALLENGE 2020
1ère étape | février 2020

Prize Money: 500CHF
(Prix adaptés si tournoi incomplet)

30CHF /équipe
BIÈRES INCLUSES

Pour sa 2ème année, le GBPC vous donne rendez-vous dès le mois de février 2020 pour désigner les meilleurs joueurs du canton 2019.
Prix pour les 3 premiers du classement général :
Bientôt…

Un paiement unique par équipe. Mention “GBPC2020-X / Nom de l’équipe”. Compte association Genève Ville Vivante: IBAN: CH37 0900 0000 1475 5820 8 ou compte postale: 14-755820-8. Inscription confirmée uniquement après réception du paiement.

——   NOTE IMPORTANTE   ——
🍻 RÈGLEMENT
🍻 Tous les participants ont bien évidemment la possibilité de jouer le tournoi à l’eau. Aucune consommation d’alcool obligatoire.
🍻 Équipe de 2 ou 3 joueurs (+18ans).
🍻 3 Matchs de qualification (sur 2 heures),  entre 17h et 20h. Tableau final pour les meilleurs pongistes.

——   HORAIRES DU TOURNOI   ——
À venir

Soyez présent 15 min avant votre premier match.

INSCRIPTION
à venir');
        // $projectGBPC->setColor(str_replace('#','', $this->faker->hexcolor));
        $projectGBPC->setColor('f7d861');
        $projectGBPC->setImageName('5e53fd311efdf953834314.jpg');
        $projectGBPC->setParent($projectGVV);
        $projectGBPC->setVisible(true);
        $projectGBPC->setShowHome(true);

        $projectPC = new Project();
        $projectPC->setName('Pubcrawlers.ch');
        $projectPC->setShortDescription('Découvre les bars et clubs de ta ville. Le tout dans une ambiance déjantée.');
        $projectPC->setAcronym('Pubcrawl');
        $projectPC->setDescription('Les tours organisés par pubcrawlers.ch vous feront (re)découvrir les meilleurs établissements de Genève. Ils vous emmèneront selon vos choix au gré du quartier estudiantin de Plainpalais, du quartier populaire des Pâquis ou d’un des plus anciens de la ville: Carouge. Ces trois quartiers sont des hotspots de la Genève nocturne et Pubcrawlers.ch vous les fera (re)découvrir de la meilleur des façon: en groupe, avec du fun et à petit prix. Tu aimes la fête, boire un verre entre amis, shaker ton booty? Tu trouveras forcément ce que tu cherches dans nos différent tours.');
        // $projectPC->setColor(str_replace('#','', $this->faker->hexcolor));
        $projectPC->setColor('e96656');
        $projectPC->setImageName('5e53fd70709f2022189142.jpg');
        $projectPC->setParent($projectGVV);
        $projectPC->setVisible(true);
        $projectPC->setShowHome(true);

        $projects[] = $projectGVV;
        $projects[] = $projectSP;
        $projects[] = $projectGDJC;
        $projects[] = $projectZW;
        $projects[] = $projectGBPC;
        $projects[] = $projectPC;

        foreach($projects as $key => $project)
        {
            $projects[$key]->setCreatedAt(new \DateTimeImmutable());
            $projects[$key]->setDescription(trim($project->getDescription()));
        }

       /* foreach ($projects as $project) {
            $tmpTeam = $teamRepository->findOneBy(array('name' => $project->getName()));
            $project->setTeam($tmpTeam);
        }*/

        $manager->persist($projectGVV);
        $manager->persist($projectSP);
        $manager->persist($projectGDJC);
        $manager->persist($projectZW);
        $manager->persist($projectGBPC);
        $manager->persist($projectPC);


        $manager->flush();
    }
}
