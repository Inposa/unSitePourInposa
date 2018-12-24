<?php

$action;	    //Action du controller que l'on souhaite appeler
$controller;	    //Nom du controller (celui du query string)
$controller_class;  //Nom de la classe associée à controller

//Si le controller n'est pas défini via query string, on le met par défaut à "projet"
if (!isset($_GET['controller'])) {
    $controller = 'accueil';
} else {
    $controller = $_GET['controller'];
}
//On construit le nom de notre classe
$controller_class = 'Controller'.ucfirst($controller);

//Si le nom de classe créé n'existe pas, on renvoie sur une erreur
if (!class_exists($controller_class)) {
    require_once(File::build_path(array("controller","error","ControllerError.php")));
} else {
    //Maintenant, on verifie si une action a été écrite dans le query string
    //On met sa valeur à "readAll" si pas présente
    if (!isset($_GET['action'])) {
	$action = 'readAll';
    } else {
	$action = $_GET['action'];
	$class_methods = get_class_methods($controller_class);
	
	if (!in_array($class_methods, $action)){
	    //require vers erreur
	}
	else{
	    require_once(File::build_path(array('controller',"$controller_class.php")));
	    $controller_class::$action();
	}
    }
}
