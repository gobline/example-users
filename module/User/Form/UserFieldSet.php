<?php

namespace User\Form;

use Mendo\Form\FieldSet;
use Mendo\Form\Element;
use User\Model\User;

class UserFieldSet extends FieldSet
{
    public function __construct()
    {
        parent::__construct('user');

        $user = $this->setEntity('User\Model\User');

        $this->add((new Element\Text('firstName'))
            ->setLabel('First name')
            ->setAttribute('placeholder', 'Enter first name')
            ->setFilters('required|trim'));

        $this->add((new Element\Text('lastName'))
            ->setLabel('Last name')
            ->setAttribute('placeholder', 'Enter last name')
            ->setFilters('required|trim'));

        $address = new AddressFieldSet();
        $this->add($address);

        $user->setAddress($address->getEntity());
    }
}
