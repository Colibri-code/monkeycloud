<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RolesRepository")
 */
class Roles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $rol;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserRoles", inversedBy="Roles")
     */
    private $userRoles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRol(): ?string
    {
        return $this->rol;
    }

    public function setRol(string $rol): self
    {
        $this->rol = $rol;

        return $this;
    }

    public function getUserRoles(): ?UserRoles
    {
        return $this->userRoles;
    }

    public function setUserRoles(?UserRoles $userRoles): self
    {
        $this->userRoles = $userRoles;

        return $this;
    }
}
