<?php

namespace CollDev\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CollDev\MainBundle\Entity\CommentRepository")
 */
class Comment
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
     * @ORM\Column(name="name", type="text")
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="likeme", type="smallint")
     */
    private $likeme;

    /**
     * @var integer
     *
     * @ORM\Column(name="star", type="smallint")
     */
    private $star;

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
     * Set name
     *
     * @param string $name
     * @return Comment
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set likeme
     *
     * @param integer $likeme
     * @return Comment
     */
    public function setLikeme($likeme)
    {
        $this->likeme = $likeme;
    
        return $this;
    }

    /**
     * Get likeme
     *
     * @return integer 
     */
    public function getLikeme()
    {
        return $this->likeme;
    }

    /**
     * Set star
     *
     * @param integer $star
     * @return Comment
     */
    public function setStar($star)
    {
        $this->star = $star;
    
        return $this;
    }

    /**
     * Get star
     *
     * @return integer 
     */
    public function getStar()
    {
        return $this->star;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Comment
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
     * @return Comment
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
     * @return Comment
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