<?php
/*
 * TemplateName: standard_solo_GLOBAL
 *
 * Lien vers la lp tracké
 *
 * @version: 1.1 - 03/2017
 */

/*FIX2009-11-26*/ include_once('/home/verticalmail/includes.php');

//$par_langue = 'fr_FR';//langue de la page fr_FR, en_EN, es_ES

include_once("parametres.inc");
include("../include/php_headers.inc");
$_lt = "hp";

// Ajoute les paramètres standards automatiquement + les champs en paramètres;
paramsRedirect(
	array(
		//'champs' => 'La valeur de mon champs'
	)
);

$link_desabo = 'https://eur02.safelinks.protection.outlook.com/?url=https%3A%2F%2Fwww.pages06.net%2Fpriam%2FPRMNESPRESSO%2FOptout_PRM_NESPRESSO%3FspMailingID%3D13260332%26spUserID%3DNjAwOTA2ODUxNzc1S0%26spJobID%3DMTc1MDMyNzY1MwS2%26spReportId%3DMTc1MDMyNzY1MwS2&data=04%7C01%7Cines.benyelles%40isoskele.fr%7C4623f96ed307419cd76308d90f040b7a%7Ceef00110f19348bf8f4ef7ef8c78af62%7C0%7C0%7C637557332325875170%7CUnknown%7CTWFpbGZsb3d8eyJWIjoiMC4wLjAwMDAiLCJQIjoiV2luMzIiLCJBTiI6Ik1haWwiLCJXVCI6Mn0%3D%7C1000&sdata=i9TLHyy5D6BAmzMlgWVWY7ozEyT%2BpB%2FRmVHKeBciGXI%3D&reserved=0';
if ( $par_domaine == "VM" ) {

	if ($par_src_index == 'lp') {
		//pointe sur l'index index
		header('Location: '. $link_desabo .'?' . $par_operation_client_tracking2);
	} else {
		//pointe sur le fichier lp
		header('Location: '. $link_desabo .'?' . $par_operation_client_tracking2);
	}

} elseif ( $par_domaine == "CLIENT" ) {

	if ($par_src_index == 'lp') {
		//pointe sur l'index index
		header("Location: " 	. $par_nom_domaine_client . "?src=" . $_SESSION['s_source'] .
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
	} else {
		//pointe sur le fichier lp
		header('Location: ' 	. $par_nom_domaine_client . '/' . $par_fichier_page_lp . "?src=" . $_SESSION['s_source'] .
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
