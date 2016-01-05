<?php

namespace SGT\UserBundle\Listener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Doctrine\ORM\Mapping as ORM;

use SGT\UserBundle\Entity\User;
use SGT\UserBundle\Entity\logins; // for Symfony 2.1.0+
// use Symfony\Bundle\DoctrineBundle\Registry as Doctrine; // for Symfony 2.0.x
/**
 * Custom login listener.
 */
class LoginListener
{
	/** @var \Symfony\Component\Security\Core\SecurityContext */
	private $securityContext;
	
	/** @var \Doctrine\ORM\EntityManager */
	private $em;
	
	/**
	 * Constructor
	 * 
	 * @param SecurityContext $securityContext
	 * @param Doctrine        $doctrine
	 */
	public function __construct(SecurityContext $securityContext, Doctrine $doctrine)
	{
		$this->securityContext = $securityContext;
		$this->em              = $doctrine->getManager();
	}
	
	/**
	 * Do the magic.
	 * 
	 * @param InteractiveLoginEvent $event
	 */
	public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
	{

		$user = $event->getAuthenticationToken()->getUser();

		if ($this->securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {

			if($user instanceof User)
			{
				$login = new logins();
			
				
				$login->setName($user->getName() . ' ' . $user->getLastname());
				$user->addLogin($login);
				$this->em->persist($user);
				$this->em->persist($login);
	          	$this->em->flush();
			}
			else
			{
				$login = new logins();
				$login->setName($user->getUsername());
				$this->em->persist($login);
	          	$this->em->flush();
			}
		}

		
		if ($this->securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
			// user has logged in using remember_me cookie
		}
		
		// do some other magic here
		
		
		// ...
	}
}