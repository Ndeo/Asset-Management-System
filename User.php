<?php

/**
 * Created by PhpStorm.
 * User: Waffoh
 * Date: 3/9/2019
 * Time: 7:39 AM
 */
class User
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $userRole;
    private $creationDate;
    private $state;
    private $created_by;
    private $image;

    /**
     * User constructor.
     * @param $id
     * @param $first_name
     * @param $last_name
     * @param $email
     * @param $userRole
     * @param $creationDate
     * @param $state
     * @param $created_by
     * @param $image
     */
    public function __construct($id, $user_name,$first_name, $last_name, $email, $userRole, $phone, $creationDate, $state, $created_by, $image)
    {
        $this->id = $id;
        $this->user_name=$user_name;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->userRole = $userRole;
        $this->phone = $phone;
        $this->creationDate = $creationDate;
        $this->state = $state;
        $this->created_by = $created_by;
        $this->image = $image;
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
     */
    public function setId($id)
    {
        $this->id = $id;
    }

public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $id
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }
    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
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
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUserRole()
    {
        return $this->userRole;
    }

    /**
     * @param mixed $userRole
     */
    public function setUserRole($userRole)
    {
        $this->userRole = $userRole;
    }
    
    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    
    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * @param mixed $created_by
     */
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

}