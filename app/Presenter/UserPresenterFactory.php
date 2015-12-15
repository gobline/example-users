<?php

namespace App\Presenter;

use Gobline\Presenter\PresenterFactoryInterface;
use Gobline\Router\UriBuilder;
use Gobline\Environment\Environment;

class UserPresenterFactory implements PresenterFactoryInterface
{
    private $environment;
    private $uriBuilder;

    public function __construct(
        Environment $environment, 
        UriBuilder $uriBuilder
    ) {
        $this->environment = $environment;
        $this->uriBuilder = $uriBuilder;
    }

    public function createPresenter($user)
    {
        return new UserPresenter($user, $this->environment, $this->uriBuilder);
    }
}
