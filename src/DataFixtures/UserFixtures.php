<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Class UserFixtures
 * @package App\DataFixtures
 */
class UserFixtures extends BaseFixtures
{
    /**
     * @var UserPasswordHasherInterface
     */
    private $passwordHasher;

    /**
     * UserFixtures constructor.
     * @param UserPasswordHasherInterface $passwordHasher
     */
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
        //$this->faker = new \Faker\Factory:create('fr_CH');
    }

    /**
     * @param ObjectManager $manager
     * @return mixed|void
     * @throws \Exception
     */
    public function loadData(ObjectManager $manager)
    {
        $users = new ArrayCollection();

        $steve = new User();
        $steve->setName('Vionnet');
        $steve->setFirstName('Steve');
        $steve->setBirthDate(new \DateTime('08-02-1990'));
        $steve->setEmail('steve.vionnet@gmail.com');
        $steve->setCreatedAt(new \DateTimeImmutable());
       // $steve->setPassword($this->passwordEncoder->encodePassword($steve, '12345678'));
        $steve->setPlainPassword('12345678');
        $steve->setActive(true);
        if (!$steve->isActive())
        {
            $steve->setActivationCode($this->faker->sha256);
        }
        $steve->setBanned(false);
        $steve->setPhone('+41766034207');
        $steve->setUsername('Steve');
        $steve->setRoles(array('ROLE_SUPER_ADMIN', 'ROLE_DIRECTOR'));
        $steve->setImageName('steve_silent-e1551284094485-288x300.jpg');

        $alex = new User();
        $alex->setName('Barclay');
        $alex->setFirstName('Alexander');
        $alex->setBirthDate(new \DateTime('01-01-1900'));
        $alex->setEmail('barclay.alexander@gmail.com');
        $alex->setCreatedAt(new \DateTimeImmutable());
        $alex->setPlainPassword('12345678');
        $alex->setActive(false);
        if (!$alex->isActive())
        {
            $alex->setActivationCode($this->faker->sha256);
        }
        $alex->setBanned(false);
        $alex->setPhone('+41788682342');
        $alex->setUsername('Alex');
        $alex->setRoles(array('ROLE_PRESIDENT'));
        $alex->setImageName('IMG_3590.jpg');
        $alex->setNickName('Alex');

        $tim = new User();
        $tim->setName('Fontolliet');
        $tim->setFirstName('Tim');
        $tim->setBirthDate(new \DateTime('05-05-1985'));
        $tim->setEmail('tim.fontolliet@gmail.com');
        $tim->setCreatedAt(new \DateTimeImmutable());
        $tim->setPlainPassword('12345678');
        $tim->setActive(false);
        if (!$tim->isActive())
        {
            $tim->setActivationCode($this->faker->sha256);
        }
        $tim->setBanned(false);
        $tim->setPhone('+41766164444');
        $tim->setUsername('Tim');
        $tim->setRoles(array('ROLE_PRESIDENT'));
        $tim->setImageName('Tim-e1440431497152.jpg');
       // $tim->setNickName('El Director');

        $loris = new User();
        $loris->setName('Biro-Levescot');
        $loris->setFirstName('Loris');
        $loris->setBirthDate(new \DateTime('08-10-1984'));
        $loris->setEmail('vpm_beachboy@hotmail.com');
        $loris->setCreatedAt(new \DateTimeImmutable());
        $loris->setPlainPassword('12345678');
        $loris->setActive(false);
        if (!$loris->isActive())
        {
            $loris->setActivationCode($this->faker->sha256);
        }
        $loris->setBanned(false);
        $loris->setPhone('+41765403288');
        $loris->setUsername('Loris');
        $loris->setRoles(array('ROLE_MEMBER'));
        $loris->setImageName('IMG_3390-e1441291694915.jpg');

        $mickael = new User();
        $mickael->setName('Blanco');
        $mickael->setFirstName('Mickael');
        $mickael->setBirthDate(new \DateTime('01-01-1900'));
        $mickael->setEmail('mickael.blanco@gmail.com');
        $mickael->setCreatedAt(new \DateTimeImmutable());
        $mickael->setPlainPassword('12345678');
        $mickael->setActive(false);
        if (!$mickael->isActive())
        {
            $mickael->setActivationCode($this->faker->sha256);
        }
        $mickael->setBanned(false);
        $mickael->setPhone('+41786717279');
        $mickael->setUsername('Mickael');
        $mickael->setRoles(array('ROLE_TRESORIER'));

        $lola = new User();
        $lola->setName('Biro-Levescot');
        $lola->setFirstName('Lola');
        $lola->setBirthDate(new \DateTime('21-08-1995'));
        $lola->setEmail('lola.levescot@gmail.com');
        $lola->setCreatedAt(new \DateTimeImmutable());
        $lola->setPlainPassword('12345678');
        $lola->setActive(false);
        if (!$lola->isActive())
        {
            $lola->setActivationCode($this->faker->sha256);
        }
        $lola->setBanned(false);
        $lola->setPhone('+41793570229');
        $lola->setUsername('Lola');
        $lola->setRoles(array('ROLE_GUIDE','ROLE_MEMBER'));
        $lola->setImageName('lola-150x150.jpg');

        $ben = new User();
        $ben->setName('Eugster');
        $ben->setFirstName('Benjamin');
        $ben->setBirthDate(new \DateTime('15-12-1981'));
        $ben->setEmail('benjamin.eugster@bluewin.ch');
        $ben->setCreatedAt(new \DateTimeImmutable());
        $ben->setPlainPassword('12345678');
        $ben->setActive(false);
        if (!$ben->isActive())
        {
            $ben->setActivationCode($this->faker->sha256);
        }
        $ben->setBanned(false);
        $ben->setPhone('+41794774020');
        $ben->setUsername('Ben');
        $ben->setRoles(array('ROLE_MANAGER_BAR'));
        $ben->setImageName('Ben-150x150.jpg');
        $ben->setNickName('Ben');

        $nicos = new User();
        $nicos->setName('Beris');
        $nicos->setFirstName('Nicolas');
        $nicos->setBirthDate(new \DateTime('12-01-1982'));
        $nicos->setEmail('nicolas.beris@argotravel.ch');
        $nicos->setCreatedAt(new \DateTimeImmutable());
        $nicos->setPlainPassword('12345678');
        $nicos->setActive(false);
        if (!$nicos->isActive())
        {
            $nicos->setActivationCode($this->faker->sha256);
        }
        $nicos->setBanned(false);
        $nicos->setPhone('+41765797786');
        $nicos->setUsername('Nicos');
        $nicos->setRoles(array('ROLE_MANAGER_BAR'));
        $nicos->setImageName('nicos-150x150.jpg');
        $nicos->setNickName('Nicos');

        $benji = new User();
        $benji->setName('Morf');
        $benji->setFirstName('Benjamin');
        $benji->setBirthDate(new \DateTime('05-05-1990'));
        $benji->setEmail('benjamin.morf@outlook.com');
        $benji->setCreatedAt(new \DateTimeImmutable());
        $benji->setPlainPassword('12345678');
        $benji->setActive(false);
        if (!$benji->isActive())
        {
            $benji->setActivationCode($this->faker->sha256);
        }
        $benji->setBanned(false);
        $benji->setPhone('+41794774020');
        $benji->setUsername('Benji');
        $benji->setRoles(array('ROLE_MANAGER_TECHNIC'));
        $benji->setImageName('benji.jpg');
        $benji->setNickName('Benji');

        $steven = new User();
        $steven->setName('MV');
        $steven->setFirstName('Steven');
        $steven->setBirthDate(new \DateTime('01-01-1900'));
        $steven->setEmail('steven.mv@gmail.com');
        $steven->setCreatedAt(new \DateTimeImmutable());
        $steven->setPlainPassword('12345678');
        $steven->setActive(false);
        if (!$steven->isActive())
        {
            $steven->setActivationCode($this->faker->sha256);
        }
        $steven->setBanned(false);
        $steven->setPhone('+33612833390');
        $steven->setUsername('Steven');
        $steven->setRoles(array('ROLE_MANAGER_TECHNIC'));
        $steven->setImageName('steven-e1508851185583.jpg');

        $jorge = new User();
        $jorge->setName('Cipriano');
        $jorge->setFirstName('Jorge');
        $jorge->setBirthDate(new \DateTime('29-06-1900'));
        $jorge->setEmail('jorge.cipriano@outlook.com');
        $jorge->setCreatedAt(new \DateTimeImmutable());
        $jorge->setPlainPassword('12345678');
        $jorge->setActive(false);
        if (!$jorge->isActive())
        {
            $jorge->setActivationCode($this->faker->sha256);
        }
        $jorge->setBanned(false);
        $jorge->setPhone('+41786443574');
        $jorge->setUsername('Jorge');
        $jorge->setRoles(array('ROLE_MEMBER'));
        $jorge->setImageName('jorge-1-e1551450198288-300x255.jpg');

        $lena = new User();
        $lena->setName('Debonneville');
        $lena->setFirstName('Lena');
        $lena->setBirthDate(new \DateTime('07-10-1900'));
        $lena->setEmail('lena.debonneville@gmail.com');
        $lena->setCreatedAt(new \DateTimeImmutable());
        $lena->setPlainPassword('12345678');
        $lena->setActive(false);
        if (!$lena->isActive())
        {
            $lena->setActivationCode($this->faker->sha256);
        }
        $lena->setBanned(false);
        $lena->setPhone('+41787045835');
        $lena->setUsername('Lena');
        $lena->setRoles(array('ROLE_MANAGER_VOLUNTEERS','ROLE_MANAGER_HEADSET'));
        $lena->setImageName('lena-e1551283671838-275x300.jpeg');

        $tidjan = new User();
        $tidjan->setName('Radi');
        $tidjan->setFirstName('Tidjan');
        $tidjan->setBirthDate(new \DateTime('09-10-1900'));
        $tidjan->setEmail('tidjan.radi@gmail.com');
        $tidjan->setCreatedAt(new \DateTimeImmutable());
        $tidjan->setPlainPassword('12345678');
        $tidjan->setActive(false);
        if (!$tidjan->isActive())
        {
            $tidjan->setActivationCode($this->faker->sha256);
        }
        $tidjan->setBanned(false);
        $tidjan->setPhone('+41766938563');
        $tidjan->setUsername('Tidjan');
        $tidjan->setRoles(array('ROLE_MEMBER'));
        $tidjan->setImageName('tidjan-square.png');

        

        $users[] = $steve;
        $users[] = $alex;
        $users[] = $tim;
        $users[] = $loris;
        $users[] = $mickael;
        $users[] = $lola;
        $users[] = $ben;
        $users[] = $nicos;
        $users[] = $benji;
        $users[] = $steven;
        $users[] = $jorge;
        $users[] = $lena;
        $users[] = $tidjan;
 
        foreach ($users as $user)
        {
            $manager->persist($user);
        }
        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return array(
           
        );
    }
}
