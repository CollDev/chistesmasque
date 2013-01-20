<?php

namespace CollDev\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restriction
 *
 * @ORM\Table(name="restriction")
 * @ORM\Entity(repositoryClass="CollDev\MainBundle\Entity\RestrictionRepository")
 */
class Restriction
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
     * @var integer $jokes
     * 
     * @ORM\OneToMany(targetEntity="Joke", mappedBy="user")
     */
    private $jokes;
    
    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="restriction")
     */
    private $users;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64)
     */
    private $name;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jokes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add jokes
     *
     * @param \CollDev\MainBundle\Entity\Joke $jokes
     * @return Restriction
     */
    public function addJoke(\CollDev\MainBundle\Entity\Joke $jokes)
    {
        $this->jokes[] = $jokes;
    
        return $this;
    }

    /**
     * Remove jokes
     *
     * @param \CollDev\MainBundle\Entity\Joke $jokes
     */
    public function removeJoke(\CollDev\MainBundle\Entity\Joke $jokes)
    {
        $this->jokes->removeElement($jokes);
    }

    /**
     * Get jokes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJokes()
    {
        return $this->jokes;
    }
    
    /**
     * Add users
     *
     * @param \CollDev\MainBundle\Entity\User $users
     * @return Restriction
     */
    public function addUser(\CollDev\MainBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \CollDev\MainBundle\Entity\User $users
     */
    public function removeUser(\CollDev\MainBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
    
    /**
     * Set name
     *
     * @param string $name
     * @return Restriction
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
}