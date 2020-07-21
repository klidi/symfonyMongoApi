<?php

namespace App\Document;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as ODMUnique;

/**
 * @ApiResource
 * @ODM\Document
 * @ODMUnique(fields="email")
 */
class User implements UserInterface
{
    /**
     * @ODM\Id(strategy="INCREMENT", type="integer")
     */
    private $id;

    /**
     * @ODM\Field(type="string")
     * @ODM\Index(unique=true, order="asc")
     * @Assert\NotBlank()
     * @Assert\NotNull
     */
    private $username;

    /**
     * @ODM\Field(type="string")
     * @Assert\NotBlank()
     * @Assert\NotNull
     */
    private $password;

    /**
     * @ODM\Field(type="boolean")
     */
    private $isActive;

    public function __construct($username)
    {
        $this->isActive = true;
        $this->username = $username;
    }

    public function getUsername() : string
    {
        return $this->username;
    }

    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }

    public function getSalt()
    {
        return null;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }

    public function getRoles() : array
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }
}
