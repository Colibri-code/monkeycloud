<?php

namespace App\Repository;

use App\Entity\SignUp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method SignUp|null find($id, $lockMode = null, $lockVersion = null)
 * @method SignUp|null findOneBy(array $criteria, array $orderBy = null)
 * @method SignUp[]    findAll()
 * @method SignUp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SignUpRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Signup::class);
        $this->manager = $manager;

    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof Signup) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }


    public function saveSignup($email, $password, $FullName){

        $newSignup = new SignUp();
        
        $newSignup
            ->setEmail($email)
            ->setpassword($password)
            ->setFullName($FullName);
        
            $this->manager->persist($newSignup);
            $this->manager->flush();
    }
    // /**
    //  * @return Signup[] Returns an array of Signup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Signup
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
