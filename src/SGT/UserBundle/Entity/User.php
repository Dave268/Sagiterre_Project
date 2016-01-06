<?php

namespace SGT\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SGT\UserBundle\Entity\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User implements AdvancedUserInterface
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
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    private $salt;

    /**
     *
     * @ORM\ManyToMany(targetEntity="SGT\UserBundle\Entity\Roles", inversedBy="users")
     */
    private $userRoles;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled = true;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean", nullable=true)
     */
    private $actif = true;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255, nullable=true)
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=255, nullable=true)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="postal", type="string", length=255, nullable=true)
     */
    private $postal;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity="SGT\UserBundle\Entity\Country", inversedBy="users")
     * @ORM\JoinColumn(nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="mobilephone", type="string", length=255, nullable=true)
     */
    private $mobilephone;

    /**
     * @var string
     *
     * @ORM\Column(name="emergencylastname", type="string", length=255, nullable=true)
     */
    private $emergencylastname;

    /**
     * @var string
     *
     * @ORM\Column(name="emergencyname", type="string", length=255, nullable=true)
     */
    private $emergencyname;

    /**
     * @var string
     *
     * @ORM\Column(name="emergencyrelation", type="string", length=255, nullable=true)
     */
    private $emergencyrelation;

    /**
     * @var string
     *
     * @ORM\Column(name="emergencyphone", type="string", length=255, nullable=true)
     */
    private $emergencyphone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime")
     */
    private $dateAdd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_update", type="datetime", nullable=true)
     */
    private $dateUpdate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="newsletter", type="boolean", nullable=true)
     */
    private $newsletter = true;

    /**
     * @ORM\OneToMany(targetEntity="SGT\UserBundle\Entity\logins", mappedBy="user")
     * @ORM\JoinColumn(nullable=false)
     */
    private $logins;

    /**
     * @ORM\OneToMany(targetEntity="SGT\MediaBundle\Entity\Media", mappedBy="author")
     * @ORM\JoinColumn(nullable=true)
     */
    private $medias;

    /**
     * @ORM\OneToMany(targetEntity="SGT\ContentBundle\Entity\Content", mappedBy="author")
     * @ORM\JoinColumn(nullable=true)
     */
    private $contents;

    /**
     * @ORM\OneToMany(targetEntity="SGT\NewsBundle\Entity\News", mappedBy="author")
     * @ORM\JoinColumn(nullable=true)
     */
    private $news;



    public function __construct()
    {
        $this->dateAdd = new \DateTime();
        $this->salt = md5(uniqid(null, true));

        $this->logins = new ArrayCollection();
        $this->userRoles = new ArrayCollection();
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setDateUpdate(new \DateTime());
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return User
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * Set actif
     *
     * @param string $actif
     * @return User
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return string 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set profession
     *
     * @param string $profession
     * @return User
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string 
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return User
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set number
     *
     * @param string $number
     * @return User
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set postal
     *
     * @param string $postal
     * @return User
     */
    public function setPostal($postal)
    {
        $this->postal = $postal;

        return $this;
    }

    /**
     * Get postal
     *
     * @return string 
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }


    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mobilephone
     *
     * @param string $mobilephone
     * @return User
     */
    public function setMobilephone($mobilephone)
    {
        $this->mobilephone = $mobilephone;

        return $this;
    }

    /**
     * Get mobilephone
     *
     * @return string 
     */
    public function getMobilephone()
    {
        return $this->mobilephone;
    }

    /**
     * Set emergencycontact
     *
     * @param string $emergencycontact
     * @return User
     */
    public function setEmergencycontact($emergencycontact)
    {
        $this->emergencycontact = $emergencycontact;

        return $this;
    }

    /**
     * Get emergencycontact
     *
     * @return string 
     */
    public function getEmergencycontact()
    {
        return $this->emergencycontact;
    }

    /**
     * Set emergencyrelation
     *
     * @param string $emergencyrelation
     * @return User
     */
    public function setEmergencyrelation($emergencyrelation)
    {
        $this->emergencyrelation = $emergencyrelation;

        return $this;
    }

    /**
     * Get emergencyrelation
     *
     * @return string 
     */
    public function getEmergencyrelation()
    {
        return $this->emergencyrelation;
    }

    /**
     * Set emergencyphone
     *
     * @param string $emergencyphone
     * @return User
     */
    public function setEmergencyphone($emergencyphone)
    {
        $this->emergencyphone = $emergencyphone;

        return $this;
    }

    /**
     * Get emergencyphone
     *
     * @return string 
     */
    public function getEmergencyphone()
    {
        return $this->emergencyphone;
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
     * Set dateAdd
     *
     * @param \DateTime $dateAdd
     * @return User
     */
    public function setDateAdd($dateAdd)
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    /**
     * Get dateAdd
     *
     * @return \DateTime 
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    /**
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     * @return User
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    /**
     * Get dateUpdate
     *
     * @return \DateTime 
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * Set dateLastLogin
     *
     * @param \DateTime $dateLastLogin
     * @return User
     */
    public function setDateLastLogin($dateLastLogin)
    {
        $this->dateLastLogin = $dateLastLogin;

        return $this;
    }

    /**
     * Get dateLastLogin
     *
     * @return \DateTime 
     */
    public function getDateLastLogin()
    {
        return $this->dateLastLogin;
    }

    /**
     * Set newsletter
     *
     * @param boolean $newsletter
     * @return User
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return boolean 
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * Set emergencylastname
     *
     * @param string $emergencylastname
     * @return User
     */
    public function setEmergencylastname($emergencylastname)
    {
        $this->emergencylastname = $emergencylastname;

        return $this;
    }

    /**
     * Get emergencylastname
     *
     * @return string 
     */
    public function getEmergencylastname()
    {
        return $this->emergencylastname;
    }

    /**
     * Set emergencyname
     *
     * @param string $emergencyname
     * @return User
     */
    public function setEmergencyname($emergencyname)
    {
        $this->emergencyname = $emergencyname;

        return $this;
    }

    /**
     * Get emergencyname
     *
     * @return string 
     */
    public function getEmergencyname()
    {
        return $this->emergencyname;
    }

    /**
     * Add logins
     *
     * @param \SGT\UserBundle\Entity\logins $logins
     * @return User
     */
    public function addLogin(\SGT\UserBundle\Entity\logins $logins)
    {
        $this->logins[] = $logins;

        $logins->setUser($this);

        return $this;
    }

    /**
     * Remove logins
     *
     * @param \SGT\UserBundle\Entity\logins $logins
     */
    public function removeLogin(\SGT\UserBundle\Entity\logins $logins)
    {
        $this->logins->removeElement($logins);
    }

    /**
     * Get logins
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLogins()
    {
        return $this->logins;
    }

    public function defineRest($pwd)
    {
        $this->username = $this->getName() . substr($this->getLastname(),0,1);
        $this->password = $pwd;
    }

    public function eraseCredentials()
    {
    }
    
    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->enabled;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->salt,
            $this->enabled
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->salt,
            $this->enabled
        ) = unserialize($serialized);
    }

    public function getRoles()
    {
        $roles = array();
        foreach ($this->userRoles as $role) 
        {
            $roles[] = $role->getRole();
        }

        return $roles;
    }
    /**
     * Add userRoles
     *
     * @param \SGT\UserBundle\Entity\Roles $userRoles
     * @return User
     */
    public function addUserRole(\SGT\UserBundle\Entity\Roles $userRoles)
    {
        $this->userRoles[] = $userRoles;

        $userRoles->setUser($this);

        return $this;
    }

    /**
     * Remove userRoles
     *
     * @param \SGT\UserBundle\Entity\Roles $userRoles
     */
    public function removeUserRole(\SGT\UserBundle\Entity\Roles $userRoles)
    {
        $this->userRoles->removeElement($userRoles);
    }

    /**
     * Get userRoles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }

    public function getHeaders()
    {
        return array('id', 'Username', 'email', 'enabled', 'salt', 'password', 'Name', 'Lastname', 'actif', 'Profession', 'Street', 'Number', 'Postal', 'City', 'Country', 'Phone', 'mobilephone', 'Birthday', 'date_add', 'date_update', 'newsletter');
    }

    public function toArray($id, $email, $adress, $phone, $birthday, $emergency)
    {
        $tableau = array();
        
        if($id)
        {
            $tableau[] = $this->id;
        }
        
        $tableau[] = $this->lastname;
        $tableau[] = $this->name;
        
        if($email)
        {
            $tableau[] = $this->email;
        }
        
        if($phone)
        {
            $tableau[] = $this->mobilephone;
        }
        
        if($adress)            
        {
            $tableau[] = $this->street . ' ' .  $this->number . ', ' . $this->postal . ' ' . $this->city;
        }
        
        if($birthday)
        {
            $tableau[] = date_format($this->birthday, 'Y-m-d');
        }
        
        if($emergency)
        {
            $tableau[] = $this->emergencylastname . ' ' . $this->emergencyname . ': ' . $this->emergencyphone;
        }
        


        return $tableau;
    }


    /**
     * Add medias
     *
     * @param \SGT\MediaBundle\Entity\Media $medias
     * @return User
     */
    public function addMedia(\SGT\MediaBundle\Entity\Media $medias)
    {
        $this->medias[] = $medias;
        $medias->setAuthor($this);

        return $this;
    }

    /**
     * Remove medias
     *
     * @param \SGT\MediaBundle\Entity\Media $medias
     */
    public function removeMedia(\SGT\MediaBundle\Entity\Media $medias)
    {
        $this->medias->removeElement($medias);
    }

    /**
     * Get medias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * Set country
     *
     * @param \SGT\UserBundle\Entity\Country $country
     * @return User
     */
    public function setCountry(\SGT\UserBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \SGT\UserBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add contents
     *
     * @param \SGT\ContentBundle\Entity\Content $contents
     * @return User
     */
    public function addContent(\SGT\ContentBundle\Entity\Content $contents)
    {
        $this->contents[] = $contents;

        return $this;
    }

    /**
     * Remove contents
     *
     * @param \SGT\ContentBundle\Entity\Content $contents
     */
    public function removeContent(\SGT\ContentBundle\Entity\Content $contents)
    {
        $this->contents->removeElement($contents);
    }

    /**
     * Get contents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * Add news
     *
     * @param \SGT\NewsBundle\Entity\News $news
     * @return User
     */
    public function addNews(\SGT\NewsBundle\Entity\News $news)
    {
        $this->news[] = $news;

        return $this;
    }

    /**
     * Remove news
     *
     * @param \SGT\NewsBundle\Entity\News $news
     */
    public function removeNews(\SGT\NewsBundle\Entity\News $news)
    {
        $this->news->removeElement($news);
    }

    /**
     * Get news
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNews()
    {
        return $this->news;
    }
}
