<?php

namespace CollDev\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="CollDev\MainBundle\Entity\CommentRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var integer
     *
     * @ORM\Column(name="likeme", type="smallint", nullable=false)
     */
    private $likeme;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime")
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
     * @param string $comment
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
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
    
    /**
     * Defaults when inserting a user
     * 
     * @ORM\PrePersist()
     */
    public function prePersistTasks()
    {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime('0000-00-00 00:00:00'));
        $this->setStatus(1);
    }
    
    /**
     * @ORM\PreUpdate()
     */
    public function preUpdateTasks()
    {
        $this->setUpdated(new \DateTime());
    }
}