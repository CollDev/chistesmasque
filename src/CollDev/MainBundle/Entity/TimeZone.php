<?php

namespace CollDev\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimeZone
 *
 * @ORM\Table(name="timezone")
 * @ORM\Entity(repositoryClass="CollDev\MainBundle\Entity\TimeZoneRepository")
 */
class TimeZone
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
     * @ORM\Column(name="name", type="string", length=10)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="example", type="string", length=128)
     */
    private $example;

    /**
     * @var integer
     *
     * @ORM\Column(name="hours", type="integer")
     */
    private $hours;


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
     * @return TimeZone
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
     * Set example
     *
     * @param string $example
     * @return TimeZone
     */
    public function setExample($example)
    {
        $this->example = $example;
    
        return $this;
    }

    /**
     * Get example
     *
     * @return string 
     */
    public function getExample()
    {
        return $this->example;
    }

    /**
     * Set hours
     *
     * @param integer $hours
     * @return TimeZone
     */
    public function setHours($hours)
    {
        $this->hours = $hours;
    
        return $this;
    }

    /**
     * Get hours
     *
     * @return integer 
     */
    public function getHours()
    {
        return $this->hours;
    }
}
