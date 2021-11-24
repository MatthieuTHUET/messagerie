<?php
function a_index()
{
    global $link;

    $message = "";
    $data = [];
    $sql = "";
    extract($_POST);
    if (isset($btSubmit)) {
        /* Exécution d'une requête multiple */
        $compteur = 0;
        $sql_array = explode(";", $sql);
        if (mysqli_multi_query($link, $sql)) {
            $data = [];
            $compteur = 0;
            do {
                /* Stockage du premier résultat */
                $data[$compteur] = [];
                if ($result = mysqli_store_result($link)) {
                    $data[$compteur] = mysqli_fetch_all($result, MYSQLI_ASSOC);
                }
                if (mysqli_more_results($link))
                    $compteur++;
            } while (@mysqli_next_result($link));
        }

        if (mysqli_errno($link))
            $message = "sql : " . $sql_array[$compteur] . "<br>Erreur : " . utf8_encode(mysqli_error($link));
    }

    $vue = "../application/controleur/_database/_database_index.php";
    require "../application/gabarit/gabarit.php";
}

function a_requete()
{
    global $link;

    //initialisation de message et data
    $message = "";
    $data = [];
    //éventuellement récupération de la requête sql
    extract($_POST);
    if (isset($btSubmit)) {
        //execution de la requête
        if ($result = mysqli_query($link, $sql))
            $data = $result->fetch_all(MYSQLI_ASSOC);
        else
            $message = mysqli_error($link);
    } else {
        //1ere affichage du formulaire
        $sql = "";
    }

    $vue = "../application/controleur/_database/_database_requete.php";
    require "../application/gabarit/gabarit.php";
}

function a_dataset()
{
    global $link;

    $message = "";
    extract($_POST);

    if (isset($btsubmit)) {
        //profil
        $data = ["user", "modo", "admin"];
        $nb=count($data);
        foreach ($data as $valeur) {
            $sql = "insert into profil values ('','$valeur')";
            mysqli_query($link, $sql);
        }        
        $message .= "$nb profils<br>";

        //utilisateur
        $nb=100;
        for ($i = 1; $i <= $nb; $i++) {
            $mdp = password_hash("user$i", PASSWORD_DEFAULT);
            $sql = "insert into utilisateur values ('','user$i','$mdp',1)";
            mysqli_query($link, $sql);
        }
        $message .= "$nb utilisateurs USER<br>";

        $nb=10;
        for ($i = 1; $i <= $nb; $i++) {
            $mdp = password_hash("modo$i", PASSWORD_DEFAULT);
            $sql = "insert into utilisateur values ('','modo$i','$mdp',2)";
            mysqli_query($link, $sql);
        }
        $message .= "$nb utilisateurs MODO<br>";

        $nb=2;
        for ($i = 1; $i <= $nb; $i++) {
            $mdp = password_hash("admin$i", PASSWORD_DEFAULT);
            $sql = "insert into utilisateur values ('','admin$i','$mdp',3)";
            mysqli_query($link, $sql);
        }
        $message .= "$nb utilisateurs ADMIN<br>";

        //message
        $nb=1000;
        for ($i = 1; $i <= $nb; $i++) {
            $iduser = mt_rand(1, 100);
            $dt = date("Y-m-d H:i:s", mktime($i, 0, 0, 9, 10, 2021));
            $sql = "insert into message values ('','$iduser','$dt','message $i')";
            mysqli_query($link, $sql);
        }
        $message .= "$nb message<br>";
    }

    $vue = "../application/controleur/_database/_database_dataset.php";
    require "../application/gabarit/gabarit.php";
}
