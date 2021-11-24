<?php
function a_index()
{
    require "inc_generateur.php";

    extract($_POST);
    $prefixe = $prefixe ?? 3;    
    $message = "";
    //liste des tables de la BDD
    $tables = getTables();

    if (isset($btSubmit)) {
        $menu = "";
        foreach ($tables as $cle => $table) {
            if (isset($_POST["table$cle"])) {
                genererCRUD($table,$prefixe);
                $message .= "<p><b>$table</b> : crud généré.</p>";
            }

            $menu .= "<a href='<?=hlien('$table', 'liste')?>'>$table</a>\n";
        }
        //génération de inc_nav.php
        file_put_contents("../application/gabarit/inc_nav_generated.php", $menu);
    }

    $vue = "../application/controleur/_generateur/_generateur_index.php";
    require "../application/gabarit/gabarit.php";
}
