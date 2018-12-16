<?php
/*
 * "La magie magigiquement magnifique du php"
 * La classe File permet de créer un chemin de fichier facilement 
 * et portable sur n'importe quelle machine : Windows, Mac ou Linux.
 */
class File {
    public static function build_path($path_array) {
	// $ROOT_FOLDER (sans slash à la fin) vaut
	// "/home/ann2/votre_login/public_html/TD6" à l'IUT 
	$DS = DIRECTORY_SEPARATOR;
	$ROOT_FOLDER = __DIR__.$DS.'..';
	return $ROOT_FOLDER . $DS . join($DS, $path_array);
	//On ajoute à la racine un / + un tableau qui va contenir le chemin 
	//vers le fichier désiré
	
    }
}
