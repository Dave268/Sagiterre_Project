<?php

namespace SGT\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
	public function getUsers($active, $criteria, $desc)
	{
		$qb = $this->createQueryBuilder('a');

		if($active)
		{
			if($desc)
			{
				$qb->where('a.actif = :actif')
					->setParameter('actif', true)
				->orderBy('a.'.$criteria, 'DESC')
			;
			}
			else
			{
				$qb->where('a.actif = :actif')
					->setParameter('actif', true)
				->orderBy('a.'.$criteria)
			;
			}
			
		}
		else
		{
			if($desc)
			{
				$qb->orderBy('a.'.$criteria, 'DESC');
			}
			else
			{
				$qb->orderBy('a.'.$criteria);
			}
		}

		return $qb->getQuery()->getResult();

	}

	public function getExportQuery()
    {
        $queryBuilder = $this->createQueryBuilder('a');
	    $query = $queryBuilder->getQuery();
	    $results = $query->getResult();
	    return $query;
    }
}