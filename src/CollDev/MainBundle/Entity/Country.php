<?php

namespace CollDev\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="CollDev\MainBundle\Entity\CountryRepository")
 */
class Country
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
     * @var integer $continent_id
     * 
     * @ORM\ManyToOne(targetEntity="Continent", inversedBy="countrys")
     * @ORM\JoinColumn(name="continent_id", referencedColumnName="id", nullable=false)
     * @return integer
     */
    private $continent;
    
    /**
     * @var integer $users
     * 
     * @ORM\OneToMany(targetEntity="User", mappedBy="country")
     */
    private $users;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=14)
     */
    private $code;
    
    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set continent
     *
     * @param \CollDev\MainBundle\Entity\Continent $continent
     * @return Country
     */
    public function setContinent(\CollDev\MainBundle\Entity\Continent $continent)
    {
        $this->continent = $continent;
    
        return $this;
    }

    /**
     * Get continent
     *
     * @return \CollDev\MainBundle\Entity\Continent 
     */
    public function getContinent()
    {
        return $this->continent;
    }
    
    /**
     * Add users
     *
     * @param \CollDev\MainBundle\Entity\User $users
     * @return Country
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
     * @return Country
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
     * Set code
     *
     * @param string $code
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }
}