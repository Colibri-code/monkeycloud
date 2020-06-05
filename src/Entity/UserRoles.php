<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRolesRepository")
 */
class UserRoles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userRoles")
     */
    private $User;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Roles", mappedBy="userRoles")
     */
    private $Roles;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Projects", cascade={"persist", "remove"})
     */
    private $Project;

    public function __construct()
    {
        $this->Roles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    /**
     * @return Collection|Roles[]
     */
    public function getRoles(): Collection
    {
        return $this->Roles;
    }

    public function addRole(Roles $role): self
    {
        if (!$this->Roles->contains($role)) {
            $this->Roles[] = $role;
            $role->setUserRoles($this);
        }

        return $this;
    }

    public function removeRole(Roles $role): self
    {
        if ($this->Roles->contains($role)) {
            $this->Roles->removeElement($role);
            // set the owning side to null (unless already changed)
            if ($role->getUserRoles() === $this) {
                $role->setUserRoles(null);
            }
        }

        return $this;
    }

    public function getProject(): ?Projects
    {
        return $this->Project;
    }

    public function setProject(?Projects $Project): self
    {
        $this->Project = $Project;

        return $this;
    }
}
