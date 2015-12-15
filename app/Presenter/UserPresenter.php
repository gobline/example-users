<?php

namespace App\Presenter;

use Gobline\Presenter\Presenter;
use Gobline\Presenter\PresenterFactory;
use App\Model\User;
use Gobline\Translator\Translator;
use App\ViewHelper\Resize\Resize;
use Gobline\Router\UriBuilder;
use Gobline\Router\RouteData;
use Gobline\Environment\Environment;

class UserPresenter extends Presenter
{
    private $environment;
    private $uriBuilder;

    public function __construct(
        User $subject,
        Environment $environment,
        UriBuilder $uriBuilder
    ) {
        parent::__construct($subject);
        $this->environment = $environment;
        $this->uriBuilder = $uriBuilder;
    }

    public function getLink()
    {
        $routeData = new RouteData('propertyDetails', ['id' => $this->subject->getId()]);

        $uri = $this->uriBuilder->buildUri($routeData);
        $uri = $this->environment->buildUri($uri);

        return $uri;
    }

    public function getFullName()
    {
        return $this->subject->getFirstName().' '.$this->subject->getLastName();
    }

    public function getAddress()
    {
        return (new PresenterFactory())->createPresenter($this->subject->getAddress());
    }
}
