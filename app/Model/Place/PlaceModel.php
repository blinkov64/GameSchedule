<?php

namespace Schedule\Model\Place;

class PlaceModel {
    
    private $id;
    private $name;
    private $address;
    private $active;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getAddress()
    {
        return $this->address;
    }
    
    public function getActive()
    {
        return $this->active;
    }
}
