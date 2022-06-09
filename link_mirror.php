<?php
/*
 * TemplateName: standard_solo_GLOBAL
 *
 * Lien mirroir du mail pour voir la version en ligne
 *
 * @version: 1.1 - 03/2017
 */

/*FIX2009-11-26*/ include_once('/home/verticalmail/includes.php');

include_once("parametres.inc");
include("../include/php_headers.inc");
$_lt = "hp";

//header('Location: https://www.vertical-mail.com/' . $par_operation . '/');
if ( $par_domaine == "VM" ) {
	
	header('Location: ' . $par_nom_domaine_vm . '/' . $par_operation . '/' . $par_fichier_mail_initial);

} elseif ( $par_domaine == "CLIENT" ) {
	 
	header('Location: ' 	. $par_nom_domaine_client . '/' . $par_fichier_mail_initial . "?src=" . $_SESSION['s_source'] . 
		"&tit=" 				. $_SESSION['s_titre'] . 
		"&nom=" 				. urlencode($_SESSION['s_nom']) . 
		"&pre=" 				. urlencode($_SESSION['s_prenom']) . 
		"&email=" 			. $_SESSION['s_email'] . 
		"&tel=" 				. $_SESSION['s_tel'] . 
		"&mob=" 				. $_SESSION['s_mobile'] . 
		"&soc=" 				. urlencode($_SESSION['s_societe']) . 
		"&fon=" 				. urlencode($_SESSION['s_fonction']) . 
		"&ad1=" 				. urlencode($_SESSION['s_adresse']) . 
		"&ad2=" 				. urlencode($_SESSION['s_adresse2']) . 
		"&cp=" 				. $_SESSION['s_cp'] . 
		"&vil=" 				. urlencode($_SESSION['s_ville']) . 
		"&campaign_id=" 	. $_SESSION['s_campaign_id'] . 
		"&sending_id=" 	. $_SESSION['s_sending_id'] . 
		"&base_id=" 		. $_SESSION['s_base_id'] . 
		"&contact_id=" 	. $_SESSION['s_contact_id'] . 
		"&qualif1=" 		. urlencode($_SESSION['s_qualif1']) . 
		"&qualif2=" 		. urlencode($_SESSION['s_qualif2']) . 
		"&qualif3=" 		. urlencode($_SESSION['s_qualif3']) . 
		"&qualif4=" 		. urlencode($_SESSION['s_qualif4']) . 
		"&qualif5=" 		. urlencode($_SESSION['s_qualif5']) . 
		"&qualif24=" 		. urlencode($_SESSION['s_qualif24'])
	);

}
exit;
?>
<html>

<head>
<title>Redirection ... </title>
<!--<meta http-equiv="Refresh" content="0; URL=https://www.vertical-mail.com">-->
</head>

<body text="#000000" link="#00477A">

</body>

</html>