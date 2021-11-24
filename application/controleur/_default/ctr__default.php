<?php
function a_index()
{
    $vue = "../application/controleur/_default/_default_index.php";
    require "../application/gabarit/gabarit.php";
}

function a_authentification()
{
    extract(array_map("mres", $_POST));
    $message = "";
    if (isset($btSubmit)) {
        /*
        $row=getUserByLogin($uti_login);
        S'il n'existe pas d'enregistrement correspondant au login alors $row=false;
        */
        $row = false;
        if ($row) {
            //Si le mot de passe correspond
            if (password_verify($uti_mdp, $row["uti_mdp"])) {
                //création d'une session pour l'utilisateur authentifié
                $_SESSION["ok"] = true;
                $_SESSION["uti_id"] = $row["uti_id"];
                $_SESSION["uti_login"] = $row["uti_login"];
                header("location:index.php");
            } else {
                //Si password_verify échoue
                $message = "Erreur d'authentification. Veuillez recommencer.";
            }
        } else {
            //pas d'enregistrement correspondant au login
            $message = "login inconnu. Veuillez recommencer.";
        }
    }
    $vue = "../application/controleur/_default/_default_authentification.php";
    require "../application/gabarit/gabarit.php";
}

function a_inscription()
{
    extract(array_map("mres", $_POST));
    $message = "";
    $inscription_reussie = false;
    if (isset($btSubmit)) {
        /*
        Le login doit être unique dans la table des utilisateurs
        $loginExiste = getUserByLogin($uti_login);
        */
        $loginExiste = true;
        if ($loginExiste) {
            $message = "<h3>Login déjà pris, changer de login</h3>";
            //est-ce que les 2 mdp sont égaux
        } else if ($uti_mdp != $uti_mdp2) {
            $message = "<h3>Vous n'avez pas ressaisi le même mot de passe</h3>";
        } else {
            //cryptage du mot de passe
            $_POST["uti_mdp"] = password_hash($uti_mdp, PASSWORD_DEFAULT);
            //Création du nouvel utilisateur dans la base de données
            utilisateur_save($_POST);
            $inscription_reussie = true;
        }
    }
    $vue = "../application/controleur/_default/_default_inscription.php";
    require "../application/gabarit/gabarit.php";
}

function a_deconnexion()
{
    $_SESSION = [];
    session_destroy();
    header("location:index.php");
}
