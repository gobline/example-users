<?php

namespace App\Model;

/**
 * @Embeddable
 */
class Address
{
    /** @Column(type = "string") */
    private $street;

    /** @Column(type = "string") */
    private $postalCode;

    /** @Column(type = "string") */
    private $city;

    /** @Column(type = "string") */
    private $country;

    public function __construct($street, $postalCode, $city, $country)
    {
        $this->street = $street;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->country = $country;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }
}
