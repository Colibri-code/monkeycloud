<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityManager;

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

        $newSignin = new User();

        $newSignin
            ->setEmail($email)
            ->setPassword($password)
            ->setFullName($FullName)
            ->setUserName($UserName)
            ->setIsVisible($IsVisible);
        $this->manager->persist($newSignin);
        $this->manager->flush();
    
    
    }



}
