<?php

function getTables()
{
    global $link;
    $tables = [];
    $result = mysqli_query($link, "show tables");
    while ($row = mysqli_fetch_row($result))
        $tables[] = $row[0];

    return $tables;
}

function getChamps($table)
{
    global $link;
    $champs = [];
    $result = mysqli_query($link, "show columns from $table");
    while ($row = mysqli_fetch_row($result))
        $champs[] = $row[0];

    return $champs;
}

function genererCRUD($table,$_PREFIX_LEN)
{
    //nom de la clé primaire
    $pk = substr($table, 0, $_PREFIX_LEN) . "_id";
    //liste des champs
    $champs = getChamps($table);
    //création du dossier table
    @mkdir("../application/controleur/{$table}");

    //fichier table_liste.php
    $chaine = file_get_contents("../application/controleur/_generateur/template/xxx_liste.txt");
    $chaine = str_replace("[table]", $table, $chaine);
    $chaine = str_replace("[pk]", $pk, $chaine);
    $chaine = str_replace("[thChamp]", thChamp($champs), $chaine);
    $chaine = str_replace("[tdValeur]", tdValeur($champs), $chaine);
    file_put_contents("../application/controleur/" . $table . "/" . $table . "_liste.php", $chaine);

    //fichier table_edit.php
    $chaine = file_get_contents("../application/controleur/_generateur/template/xxx_edit.txt");
    $chaine = str_replace("[table]", $table, $chaine);
    $chaine = str_replace("[pk]", $pk, $chaine);
    $chaine = str_replace("[initChamp]", initChamp($champs), $chaine);
    $chaine = str_replace("[inputChamp]", inputChamp($champs,$pk), $chaine);
    file_put_contents("../application/controleur/" . $table . "/" . $table . "_edit.php", $chaine);

    //fichier ctr_table.php
    $chaine = file_get_contents("../application/controleur/_generateur/template/ctr_xxx.txt");
    $chaine = str_replace("[table]", $table, $chaine);    
    $chaine = str_replace("[initChamp]", initChamp($champs), $chaine);
    file_put_contents("../application/controleur/" . $table . "/ctr_" . $table . ".php", $chaine);    

    //fichier ctr_table.php
    $chaine = file_get_contents("../application/controleur/_generateur/template/xxx.txt");
    $chaine = str_replace("[table]", $table, $chaine);
    $chaine = str_replace("[pk]", $pk, $chaine);
    $chaine = str_replace("[initChamp]", initChamp($champs), $chaine);
    $chaine = str_replace("[listeChamp]", listeChamp($champs), $chaine);
    $chaine = str_replace("[listeValeur]", listeValeur($champs,$pk), $chaine);
    $chaine = str_replace("[listeChampValeur]", listeChampValeur($champs,$pk), $chaine);
    file_put_contents("../application/table/" . $table . ".php", $chaine);    
}

function thChamp($tab)
{
    $s = "";
    foreach ($tab as $nom)
        $s .= "<th>$nom</th>\n";
    return $s;
}

function tdValeur($tab)
{
    $s = "";
    foreach ($tab as $nom)
        $s .= "<td><?=\$$nom?></td>\n";
    return $s;
}

function initChamp($tab)
{
    $s = "";
    foreach ($tab as $i => $nom) {
		if ($i==0)
			$s = "\$$nom=0;\n";
		else
			$s .= "\$$nom='';\n";
	}
    return $s;
}

function inputChamp($tab, $pk)
{
    $s = "";
    foreach ($tab as $nom) {
        if ($nom != $pk) {
            $s .= "<p>\n";
            $s .= "<label for='$nom'>$nom : </label>\n";
            $s .= "<input type='text' name='$nom' id='$nom' value='<?=\$$nom?>'>\n";
            $s .= "</p>\n";
        }
    }
    return $s;
}

//liste des champs : champ1, champ2, champ3...
function listeChamp($tab) {
    return implode(",",$tab);
}

//liste des valeurs, sauf le champs PK  $champ1,$champ2...
function listeValeur($tab,$pk) {
    $t = [];
    foreach ($tab as $nom) 
        if ($nom!=$pk)
            $t[]="'\$$nom'";

    return implode(",",$t);
}

//liste sauf champ PK de : champ1=$champ1, champ2=$champ2, ...etc
function listeChampValeur($tab,$pk) {
    $t=[];
    foreach ($tab as $nom) 
        if ($nom!=$pk)
            $t[]="$nom='\$$nom'";

    return implode(",",$t);
}