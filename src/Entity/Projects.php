<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=20)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Wiki;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $Labels;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Sprints", mappedBy="Project", cascade={"persist", "remove"})
     */
    private $ProjectID;

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

    public function getWiki(): ?string
    {
        return $this->Wiki;
    }

    public function setWiki(string $Wiki): self
    {
        $this->Wiki = $Wiki;

        return $this;
    }

    public function getLabels()
    {
        return $this->Labels;
    }

    public function setLabels($Labels): self
    {
        $this->Labels = $Labels;

        return $this;
    }

    public function getProjectID(): ?Sprints
    {
        return $this->ProjectID;
    }

    public function setProjectID(Sprints $ProjectID): self
    {
        $this->ProjectID = $ProjectID;

        // set the owning side of the relation if necessary
        if ($ProjectID->getProject() !== $this) {
            $ProjectID->setProject($this);
        }

        return $this->id;
    }
}
