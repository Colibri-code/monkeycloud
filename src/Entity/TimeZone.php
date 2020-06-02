<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TimeZoneRepository")
 */
class TimeZone
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
    private $TimeZoneName;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $TimeRange;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Location;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="TimezoneName", cascade={"persist", "remove"})
     */
    private $UserTimeZone;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="Location", cascade={"persist", "remove"})
     */
    private $UserLocation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTimeZoneName(): ?string
    {
        return $this->TimeZoneName;
    }

    public function setTimeZoneName(string $TimeZoneName): self
    {
        $this->TimeZoneName = $TimeZoneName;

        return $this;
    }

    public function getTimeRange(): ?string
    {
        return $this->TimeRange;
    }

    public function setTimeRange(string $TimeRange): self
    {
        $this->TimeRange = $TimeRange;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(string $Location): self
    {
        $this->Location = $Location;

        return $this;
    }

    public function getUserTimeZone(): ?User
    {
        return $this->UserTimeZone;
    }

    public function setUserTimeZone(?User $UserTimeZone): self
    {
        $this->UserTimeZone = $UserTimeZone;

        // set (or unset) the owning side of the relation if necessary
        $newTimezone = null === $UserTimeZone ? null : $this;
        if ($UserTimeZone->getTimezone() !== $newTimezone) {
            $UserTimeZone->setTimezone($newTimezone);
        }

        return $this->TimeZoneName;
    }

    public function getUserLocation(): ?User
    {
        return $this->UserLocation;
    }

    public function setUserLocation(?User $UserLocation): self
    {
        $this->UserLocation = $UserLocation;

        // set (or unset) the owning side of the relation if necessary
        $newLocation = null === $UserLocation ? null : $this;
        if ($UserLocation->getLocation() !== $newLocation) {
            $UserLocation->setLocation($newLocation);
        }

        return $this->Location;
    }
}
