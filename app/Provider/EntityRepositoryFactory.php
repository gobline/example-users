<?php

/*
 * Gobline Framework
 *
 * (c) Mathieu Decaffmeyer <mdecaffmeyer@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Provider;

use Gobline\Container\ServiceFactoryInterface;
use Doctrine\ORM\EntityManager;

/**
 * @author Mathieu Decaffmeyer <mdecaffmeyer@gmail.com>
 */
class EntityRepositoryFactory implements ServiceFactoryInterface
{
    private $entityManager;
    private $repositoryClassName;

    public function __construct(EntityManager $entityManager, $repositoryClassName)
    {
        $this->entityManager = $entityManager;
        $this->repositoryClassName = $repositoryClassName;
    }

    public function create()
    {
        return $this->entityManager->getRepository($this->repositoryClassName);
    }
}
