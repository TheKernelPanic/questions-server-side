<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use LogicException;

class DeserializeManagerRegistry implements ManagerRegistry
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    public function getDefaultConnectionName()
    {
        throw new LogicException();
    }

    public function getConnection($name = null)
    {
        throw new LogicException();
    }

    public function getConnections()
    {
        throw new LogicException();
    }

    public function getConnectionNames()
    {
        throw new LogicException();
    }

    public function getDefaultManagerName()
    {
        throw new LogicException();
    }

    public function getManager($name = null)
    {
        throw new LogicException();
    }

    public function getManagers()
    {
        throw new LogicException();
    }

    public function resetManager($name = null)
    {
        throw new LogicException();
    }

    public function getAliasNamespace($alias)
    {
        throw new LogicException();
    }

    public function getManagerNames()
    {
        throw new LogicException();
    }

    public function getRepository($persistentObject, $persistentManagerName = null)
    {
        throw new LogicException();
    }

    public function getManagerForClass($class)
    {
        return $this->entityManager;
    }
}