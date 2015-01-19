<?php

namespace User\Model;

use Mendo\Filter\FilterableInterface;

/**
 * @Entity(repositoryClass="UserRepository")
 * @Table(name="users")
 **/
class User implements FilterableInterface
{
    use PresenterTrait;

    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;

    /** @Column(type="string") **/
    private $firstName;

    /** @Column(type="string") **/
    private $lastName;

    /** @Embedded(class="Address", columnPrefix="address_") */
    private $address;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
 
    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    public function getRules()
    {
        return [
            'id' => 'optional|trim|int|cast(int)',
            'firstName' => 'required|trim|alpha|length(2,25)',
            'lastName' => 'required|trim|alpha|length(2,50)',
        ];
    }
}
