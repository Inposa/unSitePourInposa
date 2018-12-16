<?php

class Conf {

    static private $debug = true;
    static private $database = array(
	// Le nom d'hote est webinfo a l'IUT
	// ou localhost sur votre machine
	'hostname' => 'webinfo',
	
	// A l'IUT, vous avez une BDD nommee comme votre login
	// Sur votre machine, vous devrez creer une BDD
	'database' => 'pechh',
	
	// A l'IUT, c'est votre login
	// Sur votre machine, vous avez surement un compte 'root'
	'login' => 'pechh',
	
	// A l'IUT, c'est votre mdp (INE par defaut)
	// Sur votre machine personelle, vous avez creez ce mdp a l'installation
	'password' => 'MotDePasseRandom'
    );

    static public function get($attribut){
	return self::$database[$attribut];
    }
    
    /*
    static public function getLogin() {
	return self::$database['login'];
    }

    static public function getHostname() {
	return self::$database['hostname'];
    }

    static public function getDatabase() {
	return self::$database['database'];
    }

    static public function getPassword() {
	return self::$database['password'];
    }

    static public function getDebug() {
	return self::debug;
    }*/

}
