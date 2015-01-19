<?php

namespace User\Model;

trait PresenterTrait {
    public function __get($property)
    {
        $getter = 'get'.ucfirst($property);

        if (is_callable([$this, $getter])) {
            return $this->$getter();
        }
        
        return $this->$property;
    }
}