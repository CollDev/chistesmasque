<?php

namespace CollDev\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="CollDev\MainBundle\Entity\CategoryRepository")
 */
class Category
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jokes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Category
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
     * Set name
     *
     * @param string $name
     * @return Category
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