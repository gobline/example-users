<?php

namespace User;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Mendo\Mvc\Module\Module;
use User\ViewModel\ListViewModel;
use User\ViewModel\InfoViewModel;
use User\ViewModel\AddViewModel;
use User\ViewModel\EditViewModel;
use User\Controller\AddController;
use User\Controller\EditController;
use User\Controller\DeleteController;
use User\Controller\ResetController;
use User\Form\UserForm;

class ServiceProvider extends Module implements ServiceProviderInterface
{
    public function __construct()
    {
        $name = 'user';
        $path = __DIR__;
        $namespace = 'User';

        parent::__construct($name, $path, $namespace);
    }

    public function register(Container $container)
    {
        $container->extend('modules', function ($modules, $c) {
            $modules->add($this);

            return $modules;
        });

        $container['form.user'] = function ($c) {
            return new UserForm();
        };

        $container['doctrine.orm.repository.user'] = function ($c) {
            return $c['doctrine.orm']->getRepository('User\Model\User');
        };

        $container['User.ListViewModel'] = function ($c) {
            return new ListViewModel($c['doctrine.orm.repository.user']);
        };

        $container['User.InfoViewModel'] = function ($c) {
            return new InfoViewModel($c['doctrine.orm.repository.user']);
        };

        $container['User.AddViewModel'] = function ($c) {
            return new AddViewModel($c['form.user']);
        };

        $container['User.EditViewModel'] = function ($c) {
            return new EditViewModel($c['form.user']);
        };

        $container['User.AddController'] = function ($c) {
            return new AddController($c['form.user'], $c['doctrine.orm'], $c['doctrine.orm.repository.user']);
        };

        $container['User.EditController'] = function ($c) {
            return new EditController($c['form.user'], $c['doctrine.orm'], $c['doctrine.orm.repository.user']);
        };

        $container['User.DeleteController'] = function ($c) {
            return new DeleteController($c['doctrine.orm']);
        };

        $container['User.ResetController'] = function ($c) {
            return new ResetController($c['doctrine.orm.repository.user']);
        };
    }
}
