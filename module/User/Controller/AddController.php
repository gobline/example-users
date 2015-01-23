<?php

namespace User\Controller;

use Mendo\Mvc\Controller\AbstractController;
use User\Form\UserForm;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class AddController extends AbstractController
{
    private $form;
    private $orm;
    private $userRepository;
    private $maxNbUsers;

    public function __construct(
        UserForm $form,
        EntityManager $orm,
        EntityRepository $userRepository,
        $maxNbUsers = 10
    ) {
        $this->form = $form;
        $this->orm = $orm;
        $this->userRepository = $userRepository;
        $this->maxNbUsers = (int) $maxNbUsers;
    }

    public function index()
    {
        // set a limit of the maximum number of users in DB for the online demo app
        if ($this->userRepository->count() >= $this->maxNbUsers) {
            return $this->redirect('index', 'alert-max-reached');
        }

        if (
            $this->request->isPost() &&
            $this->form->validate($this->request->getPost())
        ) {
            $user = $this->form->get('user');

            $this->orm->persist($user);
            $this->orm->flush();

            return $this->redirect('index', 'info', null, ['user' => $user->getId()]);
        }
    }
}
