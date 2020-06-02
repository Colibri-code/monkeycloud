<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LanguagesRepository")
 */
class Languages
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
    private $language;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="language")
     */
    private $UserLanguage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getUserLanguage(): ?User
    {
        return $this->UserLanguage;
    }

    public function setUserLanguage(?User $UserLanguage): self
    {
        $this->UserLanguage = $UserLanguage;

        return $this->language;
    }
}
