<!DOCTYPE html>
<?php 
//TODO : require_once en chemin absolu (ou relatif, je sais plus) vers File.php
require_once 'D:\WampServer\www\Perso\lib\File.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    
    <?php
    File::build_path(array('controller','routeur.php'));
    ?>
</html>
