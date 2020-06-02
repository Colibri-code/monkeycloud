<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SignUp", inversedBy="UserPassword", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Email;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SignUp", inversedBy="UserPassword", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Password;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SignUp", inversedBy="UserNameNick", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $UserName;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Company", inversedBy="CompanyUser", cascade={"persist", "remove"})
     */
    private $Company;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Company", inversedBy="UserDepartment", cascade={"persist", "remove"})
     */
    private $Department;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Company", inversedBy="UserTeam", cascade={"persist", "remove"})
     */
    private $Team;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Bio;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\TimeZone", inversedBy="UserTimeZone", cascade={"persist", "remove"})
     */
    private $Timezone;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\TimeZone", inversedBy="UserLocation", cascade={"persist", "remove"})
     */
    private $Location;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Languages", mappedBy="UserLanguage")
     */
    private $Languages;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsVisible;

    public function __construct()
    {
        $this->Languages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?SignUp
    {
        return $this->Email;
    }

    public function setEmail(SignUp $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPassword(): ?SignUp
    {
        return $this->Password;
    }

    public function setPassword(SignUp $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getUserName(): ?SignUp
    {
        return $this->UserName;
    }

    public function setUserName(SignUp $UserName): self
    {
        $this->UserName = $UserName;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->Company;
    }

    public function setCompany(?Company $Company): self
    {
        $this->Company = $Company;

        return $this;
    }

    public function getDepartment(): ?Company
    {
        return $this->Department;
    }

    public function setDepartment(?Company $Department): self
    {
        $this->Department = $Department;

        return $this;
    }

    public function getTeam(): ?Company
    {
        return $this->Team;
    }

    public function setTeam(?Company $Team): self
    {
        $this->Team = $Team;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->Bio;
    }

    public function setBio(?string $Bio): self
    {
        $this->Bio = $Bio;

        return $this;
    }

    public function getTimezone(): ?TimeZone
    {
        return $this->Timezone;
    }

    public function setTimezone(?TimeZone $Timezone): self
    {
        $this->Timezone = $Timezone;

        return $this;
    }

    public function getLocation(): ?TimeZone
    {
        return $this->Location;
    }

    public function setLocation(?TimeZone $Location): self
    {
        $this->Location = $Location;

        return $this;
    }

    /**
     * @return Collection|Languages[]
     */
    public function getLanguages(): Collection
    {
        return $this->Languages;
    }

    public function addLanguage(Languages $language): self
    {
        if (!$this->Languages->contains($language)) {
            $this->Languages[] = $language;
            $language->setUserLanguage($this);
        }

        return $this;
    }

    public function removeLanguage(Languages $language): self
    {
        if ($this->Languages->contains($language)) {
            $this->Languages->removeElement($language);
            // set the owning side to null (unless already changed)
            if ($language->getUserLanguage() === $this) {
                $language->setUserLanguage(null);
            }
        }

        return $this;
    }

    public function getIsVisible(): ?bool
    {
        return $this->IsVisible;
    }

    public function setIsVisible(bool $IsVisible): self
    {
        $this->IsVisible = $IsVisible;

        return $this;
    }
}
