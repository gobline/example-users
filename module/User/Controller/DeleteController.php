<?php

namespace User\Controller;

use Mendo\Mvc\Controller\AbstractController;
use User\Form\UserForm;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class DeleteController extends AbstractController
{
    private $orm;

    public function __construct(EntityManager $orm)
    {
        $this->orm = $orm;
    }

    public function index()
    {
        $userId = $this->request->getParam('user');
        $userId = $this->filter($userId, 'required|trim|int|min(1)|cast(int)');
        if (!$userId) {
            throw new \RuntimeException();
        }

        $user = $this->orm->getReference('User\Model\User', $userId);
        $this->orm->remove($user);
        $this->orm->flush();

        return $this->redirect('index', 'list');
    }
}
