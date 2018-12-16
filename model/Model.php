<?php

class Model {

    public static $pdo;

    /*
     * Fonction d'initialisation de la base de données
     */

    public static function Init() {
	//Initialisation de la connexion à la base de donnée
	$hostname = Conf::getHostname();
	$database_name = Conf::getDatabase();
	$login = Conf::getLogin();
	$password = Conf::getPassword();
	try {
	    self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	    self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //On se connecte à la BDD, on affiche toute les erreurs et on fixe le format à utf8
	} catch (PDOException $ex) {
	    if (Conf::getDebug()) {
		echo $ex->getMessage(); //On récupère le message et on l'affiche.
	    } else {
		echo "Une erreur interne vient de se produire : Erreur 500 <br> "
		. "Veuillez en informer l'admistrateur de ce site.<br>";
	    }
	    die();
	}
    }

    public static function readAll() {
	$table_name = ucfirst(static::$object);
	$class_name = 'Model' . $table_name;
	try {
	    //On peut se permettre de faire une requête de ninja car pas de risque d'injection 
	    //(à première vue car pas de partie WHERE)
	    $sql = Model::$pdo->query("SELECT * FROM $table_name");
	    //Tableau d'objets d'attribut de la table 
	    $sql->setFetchMode(PDO::FETCH_CLASS, "$class_name");
	    return $sql->fetchAll();
	} catch (PDOException $ex) {
	    return null;
	}
    }

    public static function read($idData) {
	$table_name = ucfirst(static::$object);
	$class_name = 'Model' . $table_name;
	$primary = ucfirst(static::$primary_key);

	try {
	    $sql = "SELECT * FROM $table_name WHERE $primary_key=:id_tag;";
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
		"id_tag" => $id
	    );

	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
	    $tab = $req_prep->fetchAll();

	    return $tab[0];
	} catch (Exception $ex) {
	    return null;
	}
    }

    public static function delete($id) {
	$table_name = ucfirst(static::$object);

	$primary_key = Static::$primary;
	try {
	    //Si la voiture qu'on essaye de supprimer n'existe pas, on revoie faux.
	    if (self::getVoitureByImmat($id) == false) {
		return false;
	    }

	    $sql = "DELETE FROM $table_name WHERE $primary_key=:tag_id";
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
		"tag_id" => $id
	    );

	    $req_prep->execute($values);
	    return true;
	} catch (PDOException $ex) {
	    return false;
	}
    }

}

Model::init();
