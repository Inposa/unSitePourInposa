<?php

class ModelProjet extends Model{
    private $idProjet;
    private $name;
    private $small_desc;
    private $long_desc;
    
    //idPicture
    private $picture;
    
    protected static $object = 'projet';
    protected static $primary_key = 'idProjet';

    public function __construct($data) {
	//$this->idProjet
	$this->name=$data['name'];
	$this->small_desc=$data['small_desc'];
	$this->long_desc=$data['long_desc'];
	$this->picture=$data['picture'];
    }
}

