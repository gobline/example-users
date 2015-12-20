<?php

namespace App\ActionModel;

use App\Form\UserForm;
use App\Model\UserRepository;
use Doctrine\ORM\EntityManager;

class EditActionModel
{
    public $id;
    public $form;
    public $success = false;
    private $orm;
    private $repository;

    public function __construct(
        UserForm $form, 
        EntityManager $orm, 
        UserRepository $repository
    ) {
        $this->orm = $orm;
        $this->form = $form;
        $this->repository = $repository;
    }

    private function submit()
    {
        $user = $this->form->getEntity('user');

        $this->orm->flush();

        $this->success = true;
    }

    private function populateForm($id)
    {
        $user = $this->repository->find($id);
        if (!$user) {
            throw new \RuntimeException();
        }

        $this->form->populate('user', $user);
    }

    public function __invoke($request, $id)
    {
        $this->populateForm($id);

        if (
            $request->getMethod() === 'POST' &&
            $this->form->validate($request->getParsedBody())
        ) {
            $this->submit();
        }

        $this->id = $id;
    }
}
