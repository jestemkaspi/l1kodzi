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

    public function getId()
    {
        return $this->id;
    }


    /** @Column(type="string") * */
    protected $login;

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }


    /** @Column(type="string") * */
    protected $password;

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        // hashing, salt ?
        $this->password = $password;
    }


    /** @Column(type="string") * */
    protected $avatar;

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        // base_64?
        $this->avatar = $avatar;
    }


    /** @Column(type="string") * */
    protected $email;

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        // check if there is '@'
        $this->email = $email;
    }


    /** @Column(type="datetime") * */
    protected $registration_date;

    public function getRegistration_date()
    {
        return $this->registration_date;
    }

    ////////////// testing
    public function mean(array $numbers)
    {
        return array_sum($numbers) / count($numbers);
    }
}
