<?php
/**	config.php doit être inclus sur toutes les pages du site **/

//pour l'utilisation de la variable globale $_SESSION
session_start();
//Pour afficher les jours et mois en français
setlocale(LC_TIME, 'fr-FR.UTF8', 'fra');
//Pour l'heure locale
date_default_timezone_set('Europe/Paris');

//Nom de l'application qui s'affichera dans l'onglet du navigateur
const APP_NAME="Messagerie";
//slogan affiché sous le logo
const APP_SLOGAN="Tout vos message sur une même page !";
//si true, affiche les variables $_GET, $_POST, $_SESSION
$_SESSION["debug"]=true;

//connexion à la base de données
$link = @mysqli_connect("localhost","root","","annuaire");
if ($link==false)
    $link = mysqli_connect("localhost","root","");

mysqli_set_charset($link,"UTF-8");

//librairie de fonctions utiles
require "../application/gabarit/inc_fonction.php";
