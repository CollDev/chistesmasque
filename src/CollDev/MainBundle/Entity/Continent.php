<?php

namespace CollDev\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Continent
 *
 * @ORM\Table(name="continent")
 * @ORM\Entity(repositoryClass="CollDev\MainBundle\Entity\ContinentRepository")
 */
class Continent
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
     * @var integer $countrys
     * 
     * @ORM\OneToMany(targetEntity="Country", mappedBy="continent")
     */
    private $countrys;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32)
     */
    private $name;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->countrys = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add countrys
     *
     * @param \CollDev\MainBundle\Entity\Country $countrys
     * @return Continent
     */
    public function addCountry(\CollDev\MainBundle\Entity\Country $countrys)
    {
        $this->countrys[] = $countrys;
    
        return $this;
    }

    /**
     * Remove countrys
     *
     * @param \CollDev\MainBundle\Entity\Country $countrys
     */
    public function removeCountry(\CollDev\MainBundle\Entity\Country $countrys)
    {
        $this->countrys->removeElement($countrys);
    }

    /**
     * Get countrys
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCountrys()
    {
        return $this->countrys;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Continent
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