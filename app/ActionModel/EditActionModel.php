<?php

namespace App\ActionModel;

use App\Form\UserForm;
use App\Model\UserRepository;
use Gobline\Filter\FilterFunnel;
use Doctrine\ORM\EntityManager;

class EditActionModel
{
    public $id;
    public $form;
    public $success = false;
    private $orm;
    private $repository;
    private $filter;

    public function __construct(
        UserForm $form, 
        EntityManager $orm, 
        UserRepository $repository,
        FilterFunnel $filter
    ) {
        $this->orm = $orm;
        $this->form = $form;
        $this->filter = $filter;
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
        $id = $this->filter->filter($id, 'required|trim|int');
        if (!$id) {
            throw new \RuntimeException();
        }

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
