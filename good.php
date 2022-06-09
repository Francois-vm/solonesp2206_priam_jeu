<?php
/*
 * TemplateName: standard_solo_GLOBAL
 *
 * @version: 1.1 - 03/2017
 */

/*FIX2009-11-26*/ include_once('/home/verticalmail/includes.php');

include_once("parametres.inc");
include("../include/php_headers.inc");
$_lt = "hp";

/*if ($_SESSION['s_qualif30'] != "doublon" && $_SESSION['s_qualif30'] != "IP REPOUSSEE" && $_SESSION['s_qualif30'] != "email repoussoir" && $_SESSION['s_qualif30'] != "LEAD DEJA CLIENT NESPRESSO") {

	$postback_url = "https://tracker.affiliation-isoskele.fr/?c=0Z4ZF5JIWH&l[t]=JC10&l[rid]=" . $_SESSION['s_qualif29'] . "&l[e]=" . $_SESSION['s_qualif29'] . "&u=" . $_SESSION['s_sub_id'] . "&l[ac]=";

	$ch = curl_init($postback_url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$webResult = curl_exec($ch);

	$file="/home/verticalmail/campagnes/logs_cazelis/".$par_operation.".txt";
	$today = date("d/m/Y  H:i:s");

	$result = "==========================\r\nDate : ".$today."\r\nEmail : ".$_SESSION['s_email']."\r\nRetour curl: ".$webResult."\r\nID : ".$_SESSION['s_qualif29']."\r\nCLICK_ID : ".$_SESSION['s_sub_id']."\r\n==========================\r\n";

	file_put_contents($file, $result, FILE_APPEND);

	curl_close($ch);

}*/


//header('Location: https://www.nespresso.com/fr/fr/?utm_source=Email&utm_medium=EM&utm_campaign=B2C_RETENTION&utm_cd62=B2C&utm_cd63=LOC&utm_cd65=prm07insjeu&utm_id=70770f39-d20a-47f1-8f35-526a0ddac936');
header('Location: https://www.grand-jeu-nespresso.com?form_auto_fill[email]=' . $_SESSION["s_email"] . '&form_auto_fill[lastname]=' . rawurlencode(utf8_decode($_SESSION["s_nom"])) . '&form_auto_fill[firstname]=' . rawurlencode(utf8_decode($_SESSION["s_prenom"])) . '');


?>
<!doctype html><?php /*?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php */?>
<html>
<head>
<title>Redirection ... </title>
</head>

<body>

</body>
</html>
