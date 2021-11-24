<?php
/**
 * controleur principal : paramètres  m=module&a=action
 */
require "../application/config/config.php";

//paremetre $_GET m=module et a=action
$module = $_GET["m"] ?? "_default";
$action = $_GET["a"] ?? "index";
$action = "a_" . $action;

require "../application/controleur/{$module}/ctr_{$module}.php";
$action();

?>
