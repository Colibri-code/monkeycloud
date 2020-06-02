<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $CompName;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Department;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $Departments = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $Teams = [];

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="Company", cascade={"persist", "remove"})
     */
    private $CompanyUser;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="Department", cascade={"persist", "remove"})
     */
    private $UserDepartment;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="Team", cascade={"persist", "remove"})
     */
    private $UserTeam;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompName(): ?string
    {
        return $this->CompName;
    }

    public function setCompName(string $CompName): self
    {
        $this->CompName = $CompName;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->Department;
    }

    public function setDepartment(?string $Department): self
    {
        $this->Department = $Department;

        return $this;
    }

    public function getDepartments(): ?array
    {
        return $this->Departments;
    }

    public function setDepartments(?array $Departments): self
    {
        $this->Departments = $Departments;

        return $this;
    }

    public function getTeams(): ?array
    {
        return $this->Teams;
    }

    public function setTeams(?array $Teams): self
    {
        $this->Teams = $Teams;

        return $this;
    }

    public function getCompanyUser(): ?User
    {
        return $this->CompanyUser;
    }

    public function setCompanyUser(?User $CompanyUser): self
    {
        $this->CompanyUser = $CompanyUser;

        // set (or unset) the owning side of the relation if necessary
        $newCompany = null === $CompanyUser ? null : $this;
        if ($CompanyUser->getCompany() !== $newCompany) {
            $CompanyUser->setCompany($newCompany);
        }

        return $this->CompanyUser;
    }

    public function getUserDepartment(): ?User
    {
        return $this->UserDepartment;
    }

    public function setUserDepartment(?User $UserDepartment): self
    {
        $this->UserDepartment = $UserDepartment;

        // set (or unset) the owning side of the relation if necessary
        $newDepartment = null === $UserDepartment ? null : $this;
        if ($UserDepartment->getDepartment() !== $newDepartment) {
            $UserDepartment->setDepartment($newDepartment);
        }

        return $this->CompName;
    }

    public function getUserTeam(): ?User
    {
        return $this->UserTeam;
    }

    public function setUserTeam(?User $UserTeam): self
    {
        $this->UserTeam = $UserTeam;

        // set (or unset) the owning side of the relation if necessary
        $newTeam = null === $UserTeam ? null : $this;
        if ($UserTeam->getTeam() !== $newTeam) {
            $UserTeam->setTeam($newTeam);
        }

        return $this->Teams;
    }
}
