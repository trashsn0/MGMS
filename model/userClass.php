<?php

class user
{
    private $id;
    private $accessLevel;
    private $username;
    private $password;
    private $firstName;
    private $lastName;

    function __construct($array)
    {
        $this->id = $array['id'];
        $this->accessLevel = $array['accessLevel'];
        $this->username = $array['username'];
        $this->password = $array['password'];
        $this->firstName = $array['firstName'];
        $this->lastName = $array['lastName'];
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['accessLevel'] = $this->accessLevel;
        $array['username'] = $this->username;
        $array['password'] = $this->password;
        $array['firstName'] = $this->firstName;
        $array['lastName'] = $this->lastName;
        return $array;
    }

    public function __toString()
    {
        $desc = "id: " . $this->id . "<br>";
        $desc = "accessLevel: " . $this->accessLevel . "<br>";
        $desc .= "username: " . $this->username . "<br>";
        $desc .= "password: " . $this->password . "<br>";
        $desc .= "firstName: " . $this->firstName . "<br>";
        $desc .= "lastName: " . $this->lastName . "<br>";
        return $desc;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccessLevel()
    {
        return $this->accessLevel;
    }

    /**
     * @param mixed $accessLevel
     *
     * @return self
     */
    public function setAccessLevel($accessLevel)
    {
        $this->accessLevel = $accessLevel;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

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
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     *
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     *
     * @return self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }
}
