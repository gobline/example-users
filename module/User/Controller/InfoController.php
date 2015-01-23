<?php

namespace User\Controller;

use Mendo\Mvc\Controller\AbstractController;

class InfoController extends AbstractController
{
    public function index()
    {
        $userId = $this->request->getParam('user');
        $userId = $this->filter($userId, 'required|trim|int|min(1)|cast(int)');
        if (!$userId) {
            throw new \RuntimeException();
        }

        $this->viewModel->setUserId($userId);
    }
}
