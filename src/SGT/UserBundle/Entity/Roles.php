<?php

namespace SGT\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Roles
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SGT\UserBundle\Entity\RolesRepository")
 */
class Roles implements RoleInterface
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
     * @ORM\ManyToMany(targetEntity="SGT\UserBundle\Entity\User", mappedBy="userRoles")
     * @ORM\JoinColumn(nullable=true)
     */
    private $users;

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
     * @return Roles
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @see RoleInterface
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set user
     *
     * @param \SGT\UserBundle\Entity\User $user
     * @return Roles
     */
    public function setUser(\SGT\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \SGT\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
