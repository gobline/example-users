<?php

/*
 * Mendo Framework
 *
 * (c) Mathieu Decaffmeyer <mdecaffmeyer@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace User\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * @author Mathieu Decaffmeyer <mdecaffmeyer@gmail.com>
 */
class DoctrineOrmServiceProvider implements ServiceProviderInterface
{
    private $reference;

    public function __construct($reference = 'doctrine.orm')
    {
        $this->reference = $reference;
    }

    public function register(Container $container)
    {
        $container[$this->reference] = function ($c) {
            // Create a simple "default" Doctrine ORM configuration for Annotations
            $isDevMode = true;
            $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__.'/../Model'), $isDevMode);

            // database configuration parameters
            $dbParams = array(
                'driver'   => 'pdo_sqlite',
                'path' => 'db.sqlite',
            );

            // obtaining the entity manager
            $entityManager = EntityManager::create($dbParams, $config);

            return $entityManager;
        };
    }
}
