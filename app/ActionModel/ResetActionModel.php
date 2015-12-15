<?php

namespace App\ActionModel;

use App\Model\UserRepository;

class ResetActionModel
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $this->repository->reset();
    }
}
