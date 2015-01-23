<?php

namespace User\Controller;

use Mendo\Mvc\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function index()
    {
        return $this->redirect('index', 'list');
    }
}
