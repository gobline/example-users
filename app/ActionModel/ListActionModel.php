<?php

namespace App\ActionModel;

use App\Model\UserRepository;
use App\Presenter\UserPresenterFactory;
use Gobline\Presenter\CollectionPresenter;
use Gobline\Presenter\PresenterTrait;

class ListActionModel
{
    use PresenterTrait;

    private $repository;
    private $userPresenterFactory;

    public function __construct(
        UserRepository $repository,
        UserPresenterFactory $userPresenterFactory
    ) {
        $this->repository = $repository;
        $this->userPresenterFactory = $userPresenterFactory;
    }

    public function getUsers()
    {
        $results = $this->repository->findAll();

        return new CollectionPresenter($results, $this->userPresenterFactory);
    }
}
