<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SignUp", inversedBy="UserPassword", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Email;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SignUp", inversedBy="UserPassword", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Password;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SignUp", inversedBy="UserNameNick", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $UserName;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Company", inversedBy="CompanyUser", cascade={"persist", "remove"})
     */
    private $Company;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Company", inversedBy="UserDepartment", cascade={"persist", "remove"})
     */
    private $Department;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Company", inversedBy="UserTeam", cascade={"persist", "remove"})
     */
    private $Team;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Bio;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Languages", mappedBy="UserLanguage")
     */
    private $Languages;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsVisible;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Location;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $TimeZone;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Task", mappedBy="UserThatCreated", cascade={"persist", "remove"})
     */
    private $TaskCreated;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Task", inversedBy="Assigned")
     */
    private $AssignedTask;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserRoles", mappedBy="User")
     */
    private $userRoles;

    public function __construct()
    {
        $this->Languages = new ArrayCollection();
        $this->userRoles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?SignUp
    {
        return $this->Email;
    }

    public function setEmail(SignUp $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPassword(): ?SignUp
    {
        return $this->Password;
    }

    public function setPassword(SignUp $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getUserName(): ?SignUp
    {
        return $this->UserName;
    }

    public function setUserName(SignUp $UserName): self
    {
        $this->UserName = $UserName;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->Company;
    }

    public function setCompany(?Company $Company): self
    {
        $this->Company = $Company;

        return $this;
    }

    public function getDepartment(): ?Company
    {
        return $this->Department;
    }

    public function setDepartment(?Company $Department): self
    {
        $this->Department = $Department;

        return $this;
    }

    public function getTeam(): ?Company
    {
        return $this->Team;
    }

    public function setTeam(?Company $Team): self
    {
        $this->Team = $Team;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->Bio;
    }

    public function setBio(?string $Bio): self
    {
        $this->Bio = $Bio;

        return $this;
    }

    /**
     * @return Collection|Languages[]
     */
    public function getLanguages(): Collection
    {
        return $this->Languages;
    }

    public function addLanguage(Languages $language): self
    {
        if (!$this->Languages->contains($language)) {
            $this->Languages[] = $language;
            $language->setUserLanguage($this);
        }

        return $this;
    }

    public function removeLanguage(Languages $language): self
    {
        if ($this->Languages->contains($language)) {
            $this->Languages->removeElement($language);
            // set the owning side to null (unless already changed)
            if ($language->getUserLanguage() === $this) {
                $language->setUserLanguage(null);
            }
        }

        return $this;
    }

    public function getIsVisible(): ?bool
    {
        return $this->IsVisible;
    }

    public function setIsVisible(bool $IsVisible): self
    {
        $this->IsVisible = $IsVisible;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(?string $Location): self
    {
        $this->Location = $Location;

        return $this;
    }

    public function getTimeZone(): ?string
    {
        return $this->TimeZone;
    }

    public function setTimeZone(?string $TimeZone): self
    {
        $this->TimeZone = $TimeZone;

        return $this;
    }

    public function getTaskCreated(): ?Task
    {
        return $this->TaskCreated;
    }

    public function setTaskCreated(Task $TaskCreated): self
    {
        $this->TaskCreated = $TaskCreated;

        // set the owning side of the relation if necessary
        if ($TaskCreated->getUserThatCreated() !== $this) {
            $TaskCreated->setUserThatCreated($this);
        }

        return $this->id;
    }

    public function getAssignedTask(): ?Task
    {
        return $this->AssignedTask;
    }

    public function setAssignedTask(?Task $AssignedTask): self
    {
        $this->AssignedTask = $AssignedTask;

        return $this;
    }

    /**
     * @return Collection|UserRoles[]
     */
    public function getUserRoles(): Collection
    {
        return ($this->userRoles)->id;
    }

    public function addUserRole(UserRoles $userRole): self
    {
        if (!$this->userRoles->contains($userRole)) {
            $this->userRoles[] = $userRole;
            $userRole->setUser($this);
        }

        return $this;
    }

    public function removeUserRole(UserRoles $userRole): self
    {
        if ($this->userRoles->contains($userRole)) {
            $this->userRoles->removeElement($userRole);
            // set the owning side to null (unless already changed)
            if ($userRole->getUser() === $this) {
                $userRole->setUser(null);
            }
        }

        return $this;
    }
}
