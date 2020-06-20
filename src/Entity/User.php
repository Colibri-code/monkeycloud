<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

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

    /**
    * @ORM\Column(type="string", length=180, unique=true)
    */
    private $email;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $FullName;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $UserName;

    public function __construct()
    {
        $this->Languages = new ArrayCollection();
        $this->userRoles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
    

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserName(): string
    {
        return (string) $this->UserName;
    }

    public function setUserName(string $UserName): self
    {
        $this->UserName = $UserName;
        return $this;
    }
    
    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFullName(): ?string
    {
        return $this->FullName;
    }

    public function setFullName(string $FullName): self
    {
        $this->FullName = $FullName;

        return $this;
    }

    public function getRoles(){
        return ['ROLE_USER'];
    }

}
