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
use Ramsey\Uuid\Doctrine\UuidBinaryType;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\Types\Type;
use \PDO;

/**
 * @author Mathieu Decaffmeyer <mdecaffmeyer@gmail.com>
 */
class EntityManagerFactory implements ServiceFactoryInterface
{
    private $pdo;
    private $isDevMode;

    public function __construct(PDO $pdo, $isDevMode = true)
    {
        $this->pdo = $pdo;
        $this->isDevMode = $isDevMode;
    }

    public function create()
    {
        $config = Setup::createAnnotationMetadataConfiguration([__DIR__.'/../Model/Entity'], $this->isDevMode);

        Type::addType('uuid_binary', UuidBinaryType::class);

        return EntityManager::create(['pdo' => $this->pdo], $config);
    }
}
