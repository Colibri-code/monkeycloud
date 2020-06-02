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
}
