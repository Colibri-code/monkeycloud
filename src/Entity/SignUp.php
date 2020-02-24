<?php

// This is the class that will receive the form data and
// validate it with the Validator component using constrains
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class SignUp
{
    /**
     * @Assert\NotBlank(message="Fullname is required")
     * @Assert\Length(
     *     min = 2,
     *     minMessage="The fullname should be at least 2 characters long",
     *     max = 6,
     *     maxMessage="The fullname cannot be longer than 6 characters"
     * )
     * @Assert\Regex(
     *     pattern="/^[a-zA-Z ]*$/",
     *     message="The fullname should only have letters"
     * )
     */
    protected $fullName;
    /**
     * @Assert\NotBlank(message="Email address is required")
     * @Assert\Email(
     *     message="This email is not valid"
     * )
     */
    protected $email;

    protected $userName;
    /**
     * @Assert\NotBlank(message="Password is required")
     * @Assert\Length(
     *     min = 6,
     *     minMessage="The password should be at least 6 characters long",
     * )
     */
    protected $password;
    /**
     * @return mixed
     */
    public function getFullname()
    {
        return $this->fullName;
    }
    /**
     * @param mixed $fullName
     */
    public function setFullname($fullName): void
    {
        $this->fullName = $fullName;
    }
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->userName;
    }

    /**
     * @param string $userName
     * @return SignUp
     */
    public function setUsername(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
}