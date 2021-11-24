<?php
//fabrique un lien en passant les parametres un par un à savoir :
// module, action, [cle, valeur]...
function hlien() {
	$args = func_get_args();
	$nb=count($args)/2;
	if (!is_int($nb)) {
		echo "ERREUR NOMBRE D'ARGUMENTS !!";
		exit;
	}
	$m=$args[0];
	$a=$args[1];
	
	if (!isset($args[2]))
        return "index.php?m=$m&a=$a";
    else {		
		$para=array();
		for( $i=1;$i<$nb;$i++)
			$para[]=$args[2*$i] . "=" . $args[2*$i+1];
		$s=implode("&",$para);
        return "index.php?m=$m&a=$a&$s";
	}
}

/*
affiche un tableau PHP à 2 dimension dans un tableau HTML
- $tab : tableau php à 2 dimension
*/
function arrayToHTML(array $tab)
{
    //Si $tab n'est pas vide alors on récupère le nom des champs à partir de la 1ere ligne
    if (count($tab) > 0)
        $entete = array_keys($tab[0]);
    else
        $entete = [];

    echo "<table border='1'>";
    echo "<caption> Nombre d'enregistrement : " . count($tab) . "</caption>";
    //entete du tableau HTML
    echo "<thead>";
    echo "<tr>";
    foreach ($entete as $valeur)
        echo "<th>$valeur</th>";
    echo "</tr>";
    echo "</thead>";
    //corps du tableau HTML
    echo "<tbody>";
    foreach ($tab as $cle => $ligne) {
        echo "<tr>";
        foreach ($ligne as $valeur) {
            //la fonction htmlspecialchars permet de se protéger contre l'injection de code HTML/javascript
            echo "<td>" . nl2br(htmlspecialchars($valeur, ENT_QUOTES)) . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}

//protection contre injection HTML et javascript
function hsc($x)
{
    return htmlspecialchars($x, ENT_QUOTES);
}

//protection contre injection sql
function mres($x)
{
    global $link;
    return mysqli_real_escape_string($link, $x);
}
