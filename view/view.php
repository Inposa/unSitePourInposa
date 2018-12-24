<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>
    </head>
    <body>
        <header>
            <div class="footer" id="up">Inpopo il est trop beau.com</div>
            <table>
                <tr>
                    <th>Accueil</th>
                    <th>Machin</th>
                    <th>Truc</th>
                    <th>À propos</th>
                </tr>
            </table>
        </header>

        <?php
        require (File::build_path(array('view',"$controller","$view")));
        ?>


        <footer>
            <a class="go_up" href="#up">Retour en haut</a>
        </footer>

    </body>
</html>
