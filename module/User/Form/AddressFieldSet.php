<?php

namespace User\Form;

use Mendo\Form\FieldSet;
use Mendo\Form\Element;
use User\Model\Address;

class AddressFieldSet extends FieldSet
{
    public function __construct()
    {
        parent::__construct('address');

        $user = $this->setEntity('User\Model\Address');

        $this->setLegend('Address');

        $this->add((new Element\Text('street'))
            ->setLabel('Street')
            ->setAttribute('placeholder', 'Enter street and number')
            ->setFilters('required|trim'));

        $this->add((new Element\Text('postalCode'))
            ->setLabel('Postal code')
            ->setAttribute('placeholder', 'Enter postal code')
            ->setFilters('required|trim'));

        $this->add((new Element\Text('city'))
            ->setLabel('City')
            ->setAttribute('placeholder', 'Enter city')
            ->setFilters('required|trim'));

        $this->add((new Element\Text('country'))
            ->setLabel('Country')
            ->setAttribute('placeholder', 'Enter country')
            ->setFilters('required|trim'));
    }
}
