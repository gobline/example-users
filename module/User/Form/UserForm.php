<?php

namespace User\Form;

use Mendo\Form\Form;
use Mendo\Form\Element;

class UserForm extends Form
{
    public function __construct()
    {
        $this->setMethod('post');

        $this->add(new UserFieldSet());

        $this->add(new Element\Submit('submit'));
    }
}
