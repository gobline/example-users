<?php

namespace App\ActionModel;

use App\Model\User;
use Gobline\Filter\FilterFunnel;
use Doctrine\ORM\EntityManager;

class DeleteActionModel
{
    private $orm;
    private $filter;

    public function __construct(
        EntityManager $orm,
        FilterFunnel $filter
    ) {
        $this->orm = $orm;
        $this->filter = $filter;
    }

    private function delete($id)
    {
        $user = $this->orm->getReference(User::class, $id);

        $this->orm->remove($user);
        $this->orm->flush();
    }

    public function __invoke($request, $id)
    {
        $id = $this->filter->filter($id, 'required|trim|int');
        if (!$id) {
            throw new \RuntimeException();
        }

        $this->delete($id);
    }
}
