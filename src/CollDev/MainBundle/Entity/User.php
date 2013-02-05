<?php

namespace CollDev\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="CollDev\MainBundle\Entity\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var integer $country_id
     * 
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="users")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", nullable=false)
     * @return integer
     */
    private $country;

    /**
     * @var integer $jokes
     * 
     * @ORM\OneToMany(targetEntity="Joke", mappedBy="user")
     */
    private $jokes;
    
    /**
     * @var integer $comments
     * 
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */
    private $comments;
    
    /**
     * @ORM\ManyToMany(targetEntity="Restriction")
     * @ORM\JoinTable(name="user_has_restriction",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="restriction_id", referencedColumnName="id")}
     *      )
     */
    private $restrictions;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=64, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=64, nullable=true)
     */
    private $lastname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     * @var string
     * 
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    public $photo;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="file", type="string", length=255, nullable=true)
     */
    public $file;

    /**
     * @var string
     *
     * @ORM\Column(name="timezone", type="string", length=255, nullable=true)
     */
    private $timezone;
    
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
     * Parent constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->jokes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->restrictions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set country
     *
     * @param \CollDev\MainBundle\Entity\Country $country
     * @return User
     */
    public function setCountry(\CollDev\MainBundle\Entity\Country $country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return \CollDev\MainBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add jokes
     *
     * @param \CollDev\MainBundle\Entity\Joke $jokes
     * @return User
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
     * Add comments
     *
     * @param \CollDev\MainBundle\Entity\Comment $comments
     * @return User
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
     * Add restrictions
     *
     * @param \CollDev\MainBundle\Entity\Restriction $restrictions
     * @return User
     */
    public function addRestriction(\CollDev\MainBundle\Entity\Restriction $restrictions)
    {
        $this->restrictions[] = $restrictions;
    
        return $this;
    }

    /**
     * Remove restrictions
     *
     * @param \CollDev\MainBundle\Entity\Restriction $restrictions
     */
    public function removeRestriction(\CollDev\MainBundle\Entity\Restriction $restrictions)
    {
        $this->restrictions->removeElement($restrictions);
    }

    /**
     * Get restrictions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRestrictions()
    {
        return $this->restrictions;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return User
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    
        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }
    
    /**
     * Set file
     *
     * @param string $file
     * @return User
     */
    public function setFile($file)
    {
        $this->file = $file;
    
        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     * @return User
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    
        return $this;
    }

    /**
     * Get timezone
     *
     * @return string 
     */
    public function getTimezone()
    {
        return $this->timezone;
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
     * @return User
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

    public function getAbsolutePath()
    {
        return null === $this->file
            ? null
            : $this->getUploadRootDir().'/'.$this->file;
    }

    public function getWebPath()
    {
        return null === $this->file
            ? null
            : '/' . $this->getUploadDir().'/'.$this->file;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/photos';
    }
    
    public function preUpload()
    {
        if (null !== $this->photo) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->file = $filename.'.'.$this->photo->guessExtension();
            //$this->file = $this->photo->getClientOriginalName();
        }
    }

    public function upload()
    {
        if (null === $this->photo) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->photo->move($this->getUploadRootDir(), $this->file);
        $this->setPhoto($this->file);
    }

    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
    
    /**
     * Defaults when inserting a user
     * 
     * @ORM\PrePersist()
     */
    public function prePersistTasks()
    {
        $this->preUpload();
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime('0000-00-00 00:00:00'));
        $this->setStatus(1);
    }
    
    /**
     * @ORM\PreUpdate()
     */
    public function preUpdateTasks()
    {
        $this->preUpload();
    }
    
    /**
     * Defaults when inserting a user
     * 
     * @ORM\PostPersist()
     */
    public function postPersistTasks()
    {
        $this->upload();
    }
    
    /**
     * @ORM\PostUpdate()
     */
    public function postUpdateTasks()
    {
        $this->upload();
    }

    /**
     * @ORM\PostRemove()
     */
    public function postRemoveTasks()
    {
        $this->removeUpload();
    }
}