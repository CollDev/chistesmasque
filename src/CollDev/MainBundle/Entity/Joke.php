<?php

namespace CollDev\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joke
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CollDev\MainBundle\Entity\JokeRepository")
 */
class Joke
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="part1", type="string", length=255)
     */
    private $part1;

    /**
     * @var string
     *
     * @ORM\Column(name="part2", type="string", length=255)
     */
    private $part2;

    /**
     * @var integer
     *
     * @ORM\Column(name="vote", type="integer")
     */
    private $vote;

    /**
     * @var integer
     *
     * @ORM\Column(name="visit", type="integer")
     */
    private $visit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetimetz")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetimetz")
     */
    private $updated;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint")
     */
    private $status;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set part1
     *
     * @param string $part1
     * @return Joke
     */
    public function setPart1($part1)
    {
        $this->part1 = $part1;
    
        return $this;
    }

    /**
     * Get part1
     *
     * @return string 
     */
    public function getPart1()
    {
        return $this->part1;
    }

    /**
     * Set part2
     *
     * @param string $part2
     * @return Joke
     */
    public function setQue($part2)
    {
        $this->part2 = $part2;
    
        return $this;
    }

    /**
     * Get part2
     *
     * @return string 
     */
    public function getPart2()
    {
        return $this->part2;
    }

    /**
     * Set vote
     *
     * @param integer $vote
     * @return Joke
     */
    public function setVote($vote)
    {
        $this->vote = $vote;
    
        return $this;
    }

    /**
     * Get vote
     *
     * @return integer 
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * Set visit
     *
     * @param integer $visit
     * @return Joke
     */
    public function setVisit($visit)
    {
        $this->visit = $visit;
    
        return $this;
    }

    /**
     * Get visit
     *
     * @return integer 
     */
    public function getVisit()
    {
        return $this->visit;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Joke
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Joke
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Joke
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
