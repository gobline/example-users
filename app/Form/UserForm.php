<?php

namespace App\Form;

use Gobline\Form\Form;
use Gobline\Form\Element;

class UserForm extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->setMethod('post');

        $this->add(new UserFieldSet());

        $this->add(new Element\Submit('submit'));
    }
}
