<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    private $manager;
    
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, User::class);
        $this->manager = $manager;
    }

    // Handles the sign in of a new user in the application
    public function newUser($email, $password, $FullName, $UserName, $IsVisible){

        $newSignIn = new User();

        $newSignIn
            ->setEmail($email)
            ->setPassword($password)
            ->setFullName($FullName)
            ->setUserName($UserName)
            ->setIsVisible($IsVisible);
        $this->manager->persist($newSignIn);
        $this->manager->flush();
    
    
    }

    public function updateUser(User $user)
    {
        $this->manager->persist($user);
        $this->manager->flush();
    }

    public function deleteUser(User $user)
    {
        $this->manager->remove($user);
        $this->manager->flush();
    }


}
