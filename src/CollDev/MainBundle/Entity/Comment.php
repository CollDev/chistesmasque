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
     * @var integer $user_id
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * @return integer
     */
    private $user;
    
    /**
     * @var integer $joke_id
     * 
     * @ORM\ManyToOne(targetEntity="Joke", inversedBy="comments")
     * @ORM\JoinColumn(name="joke_id", referencedColumnName="id", nullable=false)
     * @return integer
     */
    private $joke;

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
     * Set user
     *
     * @param \CollDev\MainBundle\Entity\User $user
     * @return Comment
     */
    public function setUser(\CollDev\MainBundle\Entity\User $user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \CollDev\MainBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Set joke
     *
     * @param \CollDev\MainBundle\Entity\Joke $joke
     * @return Comment
     */
    public function setJoke(\CollDev\MainBundle\Entity\Joke $joke)
    {
        $this->joke = $joke;
    
        return $this;
    }

    /**
     * Get joke
     *
     * @return \CollDev\MainBundle\Entity\Joke 
     */
    public function getJoke()
    {
        return $this->joke;
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