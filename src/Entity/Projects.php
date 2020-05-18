<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectsRepository")
 */
class Projects
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $Sprints = [];

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Wiki;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Labels;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="projects")
     */
    private $Users;

    public function __construct()
    {
        $this->Users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getSprints(): ?array
    {
        return $this->Sprints;
    }

    public function setSprints(?array $Sprints): self
    {
        $this->Sprints = $Sprints;

        return $this;
    }

    public function getWiki(): ?int
    {
        return $this->Wiki;
    }

    public function setWiki(?int $Wiki): self
    {
        $this->Wiki = $Wiki;

        return $this;
    }

    public function getLabels(): ?string
    {
        return $this->Labels;
    }

    public function setLabels(?string $Labels): self
    {
        $this->Labels = $Labels;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->Users;
    }

    public function addUser(User $user): self
    {
        if (!$this->Users->contains($user)) {
            $this->Users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->Users->contains($user)) {
            $this->Users->removeElement($user);
        }

        return $this;
    }
}
