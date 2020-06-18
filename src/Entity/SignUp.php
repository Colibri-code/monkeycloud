<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SignUpRepository")
 */
abstract class SignUp implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;



    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $FullName;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="Email", cascade={"persist", "remove"})
     */
    private $UserEmail;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="Password", cascade={"persist", "remove"})
     */
    private $UserPassword;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $UserName;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="UserName", cascade={"persist", "remove"})
     */
    private $UserNameNick;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFullName(): ?string
    {
        return $this->FullName;
    }

    public function setFullName(string $FullName): self
    {
        $this->FullName = $FullName;

        return $this;
    }

    public function getUserEmail(): ?User
    {
        return $this->Email;
    }

    public function setUserEmail(User $UserEmail): self
    {
        $this->UserEmail = $UserEmail;

        // set the owning side of the relation if necessary
        if ($UserEmail->getEmail() !== $this) {
            $UserEmail->setEmail($this);
        }

        return $this->$UserEmail;
    }

    public function getUserPassword(): ?User
    {
        return $this->UserPassword;
    }

    public function setUserPassword(User $UserPassword): self
    {
        $this->UserPassword = $UserPassword;

        // set the owning side of the relation if necessary
        if ($UserPassword->getPassword() !== $this) {
            $UserPassword->setPassword($this);
        }

        return $this->$UserPassword;
    }

    public function setUserName(string $UserName): self
    {
        $this->UserName = $UserName;

        return $this;
    }

    public function getUserNameNick(): ?User
    {
        return $this->UserNameNick;
    }

    public function setUserNameNick(User $UserNameNick): self
    {
        $this->UserNameNick = $UserNameNick;

        // set the owning side of the relation if necessary
        if ($UserNameNick->getUserName() !== $this) {
            $UserNameNick->setUserName($this);
        }

        return $this->$UserNameNick;
    }

    

}
