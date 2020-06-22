<?php

namespace App\Repository;

use App\Entity\Company;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @method Company|null find($id, $lockMode = null, $lockVersion = null)
 * @method Company|null findOneBy(array $criteria, array $orderBy = null)
 * @method Company[]    findAll()
 * @method Company[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyRepository extends ServiceEntityRepository
{
    private $manager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Company::class);
        $this->manager = $manager;
    }


    public function newCompany($CompName, $Departmens, $Teams){

        $newCompany = new Company();

        $newCompany
            ->setCompName($CompName)
            ->setDepartments($Departmens)
            ->setTeams($Teams);

        $this->manager->persist($newCompany);
        $this->manager->flush();
    
    }

    public function updateCompany(Company $Company)
    {
        $this->manager->persist($Company);
        $this->manager->flush();
    }

    public function deleteCompany(Company $Company)
    {
        $this->manager->remove($Company);
        $this->manager->flush();
    }






}
