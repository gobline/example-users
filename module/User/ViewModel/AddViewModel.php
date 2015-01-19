<?php

namespace User\ViewModel;

use Mendo\Mvc\ViewModel\AbstractViewModel;
use User\Form\UserForm;

class AddViewModel extends AbstractViewModel
{
    private $form;

    public function __construct(UserForm $form)
    {
        $this->form = $form;
    }

    public function form()
    {
        return $this->form;
    }
}
