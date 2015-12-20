<?php

namespace App\ActionModel;

use App\Model\User;
use Doctrine\ORM\EntityManager;

class DeleteActionModel
{
    private $orm;

    public function __construct(EntityManager $orm)
    {
        $this->orm = $orm;
    }

    private function delete($id)
    {
        $user = $this->orm->getReference(User::class, $id);

        $this->orm->remove($user);
        $this->orm->flush();
    }

    public function __invoke($request, $id)
    {
        $this->delete($id);
    }
}
