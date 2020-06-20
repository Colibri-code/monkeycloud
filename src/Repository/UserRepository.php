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
    public function __construct(ManagerRegistry $registry, EntityManagerINterface $manager)
    {
        parent::__construct($registry, User::class);
        $this->manager = $manager;
    }

    // Handles the sign in of a new user in the application
    public function newUser($email, $password, $FullName, $UserName){

        $newSignin = new User();

        $newSignin()
            ->setEmail($email)
            ->setPassword($password)
            ->setFullName($FullName)
            ->setUserName($UserName);
        $this->manager->persist($newSignin);
        $this->manager->flush();
    
    
    }

}
