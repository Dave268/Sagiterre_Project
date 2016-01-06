<?php

namespace SGT\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContentRole
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SGT\ContentBundle\Entity\ContentRoleRepository")
 */
class ContentRole
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
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime")
     */
    private $dateAdd;

    /**
     * @ORM\OneToMany(targetEntity="SGT\ContentBundle\Entity\Content", mappedBy="role")
     * @ORM\JoinColumn(nullable=true)
     */
    private $contents;

    public function __construct()
    {
        $this->dateAdd = new \DateTime();
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
     * Set role
     *
     * @param string $role
     * @return ContentRole
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set dateAdd
     *
     * @param \DateTime $dateAdd
     * @return ContentRole
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
     * Add contents
     *
     * @param \SGT\ContentBundle\Entity\Content $contents
     * @return ContentRole
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
}
