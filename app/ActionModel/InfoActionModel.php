<?php

namespace App\ActionModel;

use App\Model\UserRepository;
use Gobline\Filter\FilterFunnel;
use Gobline\Presenter\PresenterTrait;
use App\Presenter\UserPresenterFactory;

class InfoActionModel
{
    use PresenterTrait;

    public $id;
    private $repository;
    private $filter;
    private $userPresenterFactory;

    public function __construct(
        UserRepository $repository,
        FilterFunnel $filter,
        UserPresenterFactory $userPresenterFactory
    ) {
        $this->filter = $filter;
        $this->repository = $repository;
        $this->userPresenterFactory = $userPresenterFactory;
    }

    public function getUser()
    {
        $user = $this->repository->find($this->id);

        return $this->userPresenterFactory->createPresenter($user);
    }

    public function __invoke($request, $id)
    {
        $id = $this->filter->filter($id, 'required|trim|int');
        if (!$id) {
            throw new \RuntimeException();
        }

        $this->id = $id;
    }
}
