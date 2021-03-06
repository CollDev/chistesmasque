<?php

namespace CollDev\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joke
 *
 * @ORM\Table(name="joke")
 * @ORM\Entity(repositoryClass="CollDev\MainBundle\Entity\JokeRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @var integer $user_id
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="jokes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * @return integer
     */
    private $user;

    /**
     * @var integer $category_id
     * 
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="jokes")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     * @return integer
     */
    private $category;
    
    /**
     * @var integer $comments
     * 
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="joke")
     * @ORM\OrderBy({"created" = "DESC"})
     */
    private $comments;

    /**
     * @var string
     *
     * @ORM\Column(name="part1", type="text")
     */
    private $part1;

    /**
     * @var string
     *
     * @ORM\Column(name="part2", type="text")
     */
    private $part2;

    /**
     * @var integer
     *
     * @ORM\Column(name="vote", type="integer", nullable=true)
     */
    private $vote;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="star", type="smallint", nullable=true)
     */
    private $star;

    /**
     * @var integer
     *
     * @ORM\Column(name="visit", type="integer", nullable=true)
     */
    private $visit;

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
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * @return Joke
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
     * Set category
     *
     * @param \CollDev\MainBundle\Entity\Category $category
     * @return Joke
     */
    public function setCategory(\CollDev\MainBundle\Entity\Category $category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \CollDev\MainBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    /**
     * Add comments
     *
     * @param \CollDev\MainBundle\Entity\Comment $comments
     * @return Joke
     */
    public function addComment(\CollDev\MainBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \CollDev\MainBundle\Entity\Comment $comments
     */
    public function removeComment(\CollDev\MainBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
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
    public function setPart2($part2)
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
    
    /**
     * 
     */
    public function oneVisit()
    {
        $this->setVisit($this->getVisit() + 1);
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