<?php

namespace User\ViewModel;

use Mendo\Mvc\ViewModel\AbstractViewModel;
use Doctrine\ORM\EntityRepository;

class ListViewModel extends AbstractViewModel
{
    private $orm;

    public function __construct(EntityRepository $orm)
    {
        $this->orm = $orm;
    }

    public function users()
    {
        return $this->orm->findAll();
    }
}
