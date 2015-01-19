<?php

namespace User\ViewModel;

use Mendo\Mvc\ViewModel\AbstractViewModel;
use Doctrine\ORM\EntityRepository;

class InfoViewModel extends AbstractViewModel
{
	private $orm;
	private $id;

    public function __construct(EntityRepository $orm)
    {
        $this->orm = $orm;
    }

    public function setUserId($id)
    {
    	$this->id = $id;
    }

    public function user()
    {
        return $this->orm->find($this->id);
    }
}
