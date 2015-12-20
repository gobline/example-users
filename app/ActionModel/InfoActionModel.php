<?php

namespace App\ActionModel;

use App\Model\UserRepository;
use Gobline\Presenter\PresenterTrait;
use App\Presenter\UserPresenterFactory;

class InfoActionModel
{
    use PresenterTrait;

    public $id;
    private $repository;
    private $userPresenterFactory;

    public function __construct(
        UserRepository $repository,
        UserPresenterFactory $userPresenterFactory
    ) {
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
        $this->id = $id;
    }
}
