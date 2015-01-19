<?php

namespace User\Controller;

use Mendo\Mvc\Controller\AbstractController;
use User\Form\UserForm;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class EditController extends AbstractController
{
    private $form;
    private $orm;
    private $userRepository;

    public function __construct(UserForm $form, EntityManager $orm, EntityRepository $userRepository)
    {
        $this->form = $form;
        $this->orm = $orm;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $userId = $this->request->getParam('user');
        $userId = $this->filter($userId, 'required|trim|int|min(1)|cast(int)');
        if (!$userId) {
            throw new \RuntimeException();
        }

        $user = $this->userRepository->find($userId);
        if (!$user) {
            throw new \RuntimeException();
        }

        $this->form->populate('user', $user);

        if (
            $this->request->isPost() && 
            $this->form->validate($this->request->getPost())
        ) {
            $this->orm->flush();

            return $this->redirect('index', 'info', null, ['user' => $user->getId()]);
        }
        
        $this->orm->refresh($user);
    }
}
