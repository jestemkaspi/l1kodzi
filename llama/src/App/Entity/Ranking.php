<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use mysql_xdevapi\Exception;

/**
 * @Entity
 * @Table(name="ranking")
 **/
class Ranking
{
    /** @Id
     * @Column(type="integer")
     * @GeneratedValue *
     */
    protected $id;

    /** @Column(type="integer")
     */
    protected $userid;

    /** @Column(type="integer") **/
    protected $points;

    /** @Column(type="datetime") **/
    protected $date;



    public function getUserid()
    {
        return $this->userid;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    public function setPoints($points)
    {
        if($points < 0){
            throw new Exception("Points cannot be less than zero.");
        }
        $this->points = $points;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}