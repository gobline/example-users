<?php

namespace App\ActionModel;

use App\Form\UserForm;
use App\Model\UserRepository;
use Doctrine\ORM\EntityManager;

class AddActionModel
{
    public $id;
    public $form;
    public $success = false;
    public $maxNbUsersReached = false;
    private $orm;
    private $repository;

    public function __construct(
        UserForm $form,
        EntityManager $orm,
        UserRepository $repository
    ) {
        $this->form = $form;
        $this->orm = $orm;
        $this->repository = $repository;
    }

    private function submit()
    {
        $user = $this->form->getEntity('user');

        $this->orm->persist($user);
        $this->orm->flush();

        $this->id = $user->getId();
        $this->success = true;
    }

    private function isMaxNbUsersReached()
    {
        $this->maxNbUsersReached = ($this->repository->count() >= 2);

        return $this->maxNbUsersReached;
    }

    public function __invoke($request)
    {
        if ($this->isMaxNbUsersReached()) {
            return;
        }

        if (
            $request->getMethod() === 'POST' &&
            $this->form->validate($request->getParsedBody())
        ) {
            $this->submit();
        }
    }
}
