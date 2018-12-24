<?php

class ModelUtilisateur extends Model{
    
    private $idUtil;
    private $login;
    private $password;
    private $pseudo;
    private $mail;
    private $profil_pic;
    
    protected static $object = 'utilisateur';
    protected static $primary_key = 'idUtil';
    
    public function __construct($data) {
        $this->login=$data['login'];
        $this->password=$data['password'];
        $this->pseudo=$data['pseudo'];
        $this->mail=$data['mail'];
        $this->profil_pic=$data['profil_pic'];
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