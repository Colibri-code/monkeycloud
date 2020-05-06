<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=255)
     */
    private $Task_name;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Summary;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Label;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Attachment;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Epic;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="date")
     */
    private $Created;

    /**
     * @ORM\Column(type="date")
     */
    private $Updated;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Reported;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_Created;

    /**
     * @ORM\Column(type="array")
     */
    private $Assignee = [];

    /**
     * @ORM\Column(type="array")
     */
    private $Participants = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Linked_Tasks;

    /**
     * @ORM\Column(type="time")
     */
    private $Time_Tracking;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Watching;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Sprint;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaskName(): ?string
    {
        return $this->Task_name;
    }

    public function setTaskName(string $Task_name): self
    {
        $this->Task_name = $Task_name;

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

    public function getLabel(): ?string
    {
        return $this->Label;
    }

    public function setLabel(string $Label): self
    {
        $this->Label = $Label;

        return $this;
    }

    public function getAttachment(): ?string
    {
        return $this->Attachment;
    }

    public function setAttachment(string $Attachment): self
    {
        $this->Attachment = $Attachment;

        return $this;
    }

    public function getEpic(): ?string
    {
        return $this->Epic;
    }

    public function setEpic(string $Epic): self
    {
        $this->Epic = $Epic;

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

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->Created;
    }

    public function setCreated(\DateTimeInterface $Created): self
    {
        $this->Created = $Created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->Updated;
    }

    public function setUpdated(\DateTimeInterface $Updated): self
    {
        $this->Updated = $Updated;

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

    public function getReported(): ?string
    {
        return $this->Reported;
    }

    public function setReported(string $Reported): self
    {
        $this->Reported = $Reported;

        return $this;
    }

    public function getUserCreated(): ?string
    {
        return $this->User_Created;
    }

    public function setUserCreated(string $User_Created): self
    {
        $this->User_Created = $User_Created;

        return $this;
    }

    public function getAssignee(): ?array
    {
        return $this->Assignee;
    }

    public function setAssignee(array $Assignee): self
    {
        $this->Assignee = $Assignee;

        return $this;
    }

    public function getParticipants(): ?array
    {
        return $this->Participants;
    }

    public function setParticipants(array $Participants): self
    {
        $this->Participants = $Participants;

        return $this;
    }

    public function getLinkedTasks(): ?string
    {
        return $this->Linked_Tasks;
    }

    public function setLinkedTasks(string $Linked_Tasks): self
    {
        $this->Linked_Tasks = $Linked_Tasks;

        return $this;
    }

    public function getTimeTracking(): ?\DateTimeInterface
    {
        return $this->Time_Tracking;
    }

    public function setTimeTracking(\DateTimeInterface $Time_Tracking): self
    {
        $this->Time_Tracking = $Time_Tracking;

        return $this;
    }

    public function getWatching(): ?string
    {
        return $this->Watching;
    }

    public function setWatching(string $Watching): self
    {
        $this->Watching = $Watching;

        return $this;
    }

    public function getSprint(): ?string
    {
        return $this->Sprint;
    }

    public function setSprint(string $Sprint): self
    {
        $this->Sprint = $Sprint;

        return $this;
    }
}
