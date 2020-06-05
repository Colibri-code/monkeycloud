<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SprintsRepository")
 */
class Sprints
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Name;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Projects", inversedBy="ProjectID", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Project;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Task", mappedBy="Sprint", cascade={"persist", "remove"})
     */
    private $SprintTask;

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

    public function getProject(): ?Projects
    {
        return $this->Project;
    }

    public function setProject(Projects $Project): self
    {
        $this->Project = $Project;

        return $this;
    }

    public function getSprintTask(): ?Task
    {
        return $this->SprintTask;
    }

    public function setSprintTask(?Task $SprintTask): self
    {
        $this->SprintTask = $SprintTask;

        // set (or unset) the owning side of the relation if necessary
        $newSprint = null === $SprintTask ? null : $this;
        if ($SprintTask->getSprint() !== $newSprint) {
            $SprintTask->setSprint($newSprint);
        }

        return $this->id;
    }
}
