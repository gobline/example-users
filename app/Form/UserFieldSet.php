<?php

namespace App\Form;

use Gobline\Form\FieldSet;
use Gobline\Form\Element;
use App\Model\User;

class UserFieldSet extends FieldSet
{
    public function __construct()
    {
        parent::__construct('user');

        $user = $this->setEntity(User::class);

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
