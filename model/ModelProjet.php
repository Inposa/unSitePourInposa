<?php

class ModelProjet extends Model {

    private $idProjet;
    private $nomProjet;
    private $anneeReal;
    private $short_desc;
    private $long_desc;
    private $image;
    
    protected static $object = 'projet';
    protected static $primary_key = 'idProjet';

    public function __construct($data) {
        $this->nomProjet = $data['nomProjet'];
        $$this->anneeReal = $data['anneeReal'];
        $this->short_desc = $data['short_desc'];
        $this->long_desc = $data['long_desc'];
        $this->image = $data['image'];
    }

    public function __get($att) {
        try {
            return $this->$att;
        } catch (Exception $ex) {
            return null;
        }
    }

    public function __set($att, $val) {
        $this->$att = $val;
    }

}
