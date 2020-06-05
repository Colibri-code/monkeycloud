<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 */
class Task
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
    private $TaskName;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $Summary;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Task", inversedBy="LinkedTasks")
     */
    private $LinkToTasks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Task", mappedBy="LinkToTasks")
     */
    private $LinkedTasks;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $Description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Sprints", inversedBy="SprintTask", cascade={"persist", "remove"})
     */
    private $Sprint;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="TaskCreated", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $UserThatCreated;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="AssignedTask")
     */
    private $Assigned;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $TimeTracking;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $Watching;

    public function __construct()
    {
        $this->LinkedTasks = new ArrayCollection();
        $this->Assigned = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaskName(): ?string
    {
        return $this->TaskName;
    }

    public function setTaskName(string $TaskName): self
    {
        $this->TaskName = $TaskName;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->Summary;
    }

    public function setSummary(string $Summary): self
    {
        $this->Summary = $Summary;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getLinkToTasks(): ?self
    {
        return $this->LinkToTasks;
    }

    public function setLinkToTasks(?self $LinkToTasks): self
    {
        $this->LinkToTasks = $LinkToTasks;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getLinkedTasks(): Collection
    {
        return $this->LinkedTasks;
    }

    public function addLinkedTask(self $linkedTask): self
    {
        if (!$this->LinkedTasks->contains($linkedTask)) {
            $this->LinkedTasks[] = $linkedTask;
            $linkedTask->setLinkToTasks($this);
        }

        return $this;
    }

    public function removeLinkedTask(self $linkedTask): self
    {
        if ($this->LinkedTasks->contains($linkedTask)) {
            $this->LinkedTasks->removeElement($linkedTask);
            // set the owning side to null (unless already changed)
            if ($linkedTask->getLinkToTasks() === $this) {
                $linkedTask->setLinkToTasks(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getSprint(): ?Sprints
    {
        return $this->Sprint;
    }

    public function setSprint(?Sprints $Sprint): self
    {
        $this->Sprint = $Sprint;

        return $this;
    }

    public function getUserThatCreated(): ?User
    {
        return $this->UserThatCreated;
    }

    public function setUserThatCreated(User $UserThatCreated): self
    {
        $this->UserThatCreated = $UserThatCreated;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getAssigned(): Collection
    {
        return $this->Assigned;
    }

    public function addAssigned(User $assigned): self
    {
        if (!$this->Assigned->contains($assigned)) {
            $this->Assigned[] = $assigned;
            $assigned->setAssignedTask($this);
        }

        return $this;
    }

    public function removeAssigned(User $assigned): self
    {
        if ($this->Assigned->contains($assigned)) {
            $this->Assigned->removeElement($assigned);
            // set the owning side to null (unless already changed)
            if ($assigned->getAssignedTask() === $this) {
                $assigned->setAssignedTask(null);
            }
        }

        return $this;
    }

    public function getTimeTracking(): ?string
    {
        return $this->TimeTracking;
    }

    public function setTimeTracking(?string $TimeTracking): self
    {
        $this->TimeTracking = $TimeTracking;

        return $this;
    }

    public function getWatching(): ?string
    {
        return $this->Watching;
    }

    public function setWatching(?string $Watching): self
    {
        $this->Watching = $Watching;

        return $this;
    }
}
