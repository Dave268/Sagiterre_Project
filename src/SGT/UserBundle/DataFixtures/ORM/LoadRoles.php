<?php
// src/Osel/UserBundle/DataFixtures/ORM/LoadRoles.php

namespace SGT\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SGT\UserBundle\Entity\Roles;

class LoadRoles implements FixtureInterface
{
  public function load(ObjectManager $manager)
  {
    // Les noms d'utilisateurs à créer
    $listRoles = array(
      'ROLE_USER',
      'ROLE_ADMIN',
      'ROLE_ANIMATEUR');


    foreach ($listRoles as $role) {
      // On crée l'utilisateur
      $roles = new Roles;
      $roles->setRole($role);
      $manager->persist($roles);
    }

    // On déclenche l'enregistrement
    $manager->flush();
  }
}