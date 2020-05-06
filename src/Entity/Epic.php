<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EpicRepository")
 */
class Epic
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Project_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Epic_name;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Summary;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $attachment;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Description;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private $Created;

    /**
     * @ORM\Column(type="date_immutable")
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

    public function getProjectId(): ?int
    {
        return $this->Project_id;
    }

    public function setProjectId(int $Project_id): self
    {
        $this->Project_id = $Project_id;

        return $this;
    }

    public function getEpicName(): ?string
    {
        return $this->Epic_name;
    }

    public function setEpicName(string $Epic_name): self
    {
        $this->Epic_name = $Epic_name;

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

    public function getAttachment(): ?string
    {
        return $this->attachment;
    }

    public function setAttachment(string $attachment): self
    {
        $this->attachment = $attachment;

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

    public function getCreated(): ?\DateTimeImmutable
    {
        return $this->Created;
    }

    public function setCreated(\DateTimeImmutable $Created): self
    {
        $this->Created = $Created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeImmutable
    {
        return $this->Updated;
    }

    public function setUpdated(\DateTimeImmutable $Updated): self
    {
        $this->Updated = $Updated;

        return $this;
    }

    public function getD(): ?\DateTimeInterface
    {
        return $this->D;
    }

    public function setD(\DateTimeInterface $D): self
    {
        $this->D = $D;

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
