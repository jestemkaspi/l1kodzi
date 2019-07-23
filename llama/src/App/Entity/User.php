<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="users")
 **/
class User
{
    /** @Id
     * @Column(type="integer")
     * @GeneratedValue *
     */
    protected $id;

    /** @Column(type="string") * */
    protected $login;

    /** @Column(type="string") * */
    protected $password;

    /** @Column(type="string") * */
    protected $avatar;

    /** @Column(type="string") * */
    protected $email;


    /** @Column(type="datetime") * */
    protected $registration_date;

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getRegistration_date()
    {
        return $this->registration_date;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        // hashing, salt ?
        $this->password = $password;
    }

    public function setEmail($email)
    {
        // check if there is '@'
        $this->email = $email;
    }

    public function setAvatar($avatar)
    {
        // base_64?
        $this->avatar = $avatar;
    }

}

// ////////////////////////////////////////////////////////////////////////

class DeleteThisLaterSEWP
{
    public function showMe()
    {
        return "testujemy";
    }
};

$testClass = new DeleteThisLaterSEWP();

$testClass->showMe();



