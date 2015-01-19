<?php

namespace User\Model;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function count()
    {
        $query = $this->createQueryBuilder('e')->select('count(e)')->getQuery();

        return (int) $query->getSingleScalarResult();
    }

    public function reset()
    {
		$connection = $this->getEntityManager()->getConnection();
		$platform = $connection->getDatabasePlatform();

		$connection->executeUpdate($platform->getTruncateTableSQL('users', true));
    }
}
