<?php
namespace App\EventListener;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Exception;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Class UserListener
 * @package App\EventListener
 */
class UserListener
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var UserPasswordHasherInterface
     */
    private $passwordHasher;
    /**
     * @var Generator
     */
    private $faker;

    /**
     * UserListener constructor.
     * @param EntityManagerInterface $entityManager
     * @param UserPasswordHasherInterface $passwordHasher
     */
    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
        

    	$this->faker = Factory::create('fr_CH');
    }

    // the entity listener methods receive two arguments:
    // the entity instance and the lifecycle event
    /**
     * @param User $user
     * @param LifecycleEventArgs $event
     * @throws Exception
     */
    public function prePersist(User $user, LifecycleEventArgs $event)
    {
        if($user->getPlainPassword()) {
            $user->setPassword(
                $this->passwordHasher->hashPassword($user, $user->getPlainPassword())
            );
            $user->eraseCredentials();
        }

        //$user->setCreatedAt(new DateTime());

        if(!$user->isActive())
        {
            $user->setActivationCode($this->faker->sha256);
        }
    }

    /**
     * @param User $user
     * @param LifecycleEventArgs $event
     * @throws Exception
     */
    public function preUpdate(User $user, LifecycleEventArgs $event)
    {
        if($user->getPlainPassword()) {
            $user->setPassword(
                $this->passwordHasher->hashPassword($user, $user->getPlainPassword())
            );
            $user->eraseCredentials();
        }

       // $user->setAt(new DateTime());

        if(!$user->isActive())
        {
            $user->setActivationCode($this->faker->sha256);
        }
    }
}