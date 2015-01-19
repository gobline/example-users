<?php

namespace User\Controller;

use Mendo\Mvc\Controller\AbstractController;
use User\Form\UserForm;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ResetController extends AbstractController
{
    private $userRepository;

    public function __construct(EntityRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $this->userRepository->reset();

        return $this->redirect('index', 'list');
    }
}
