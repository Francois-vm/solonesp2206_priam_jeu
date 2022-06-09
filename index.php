<?php
/*
 * TemplateName: standard_solo_GLOBAL
 *
 * @version: 1.3 - 01/2018
 */
$par_langue = 'fr_FR';//langue de la page fr_FR, en_EN, es_ES

include_once("parametres.inc");

if ($par_src_index == "lp") {

	//Landing page du Mail Initial
	include $par_fichier_page_lp; //10.php, 20.php, 30.php...

} elseif ($par_src_index == "lp_rel") {

	//Landing page de la Relance Unique
	include $par_fichier_page_lp_rel; //10.php, 20.php, 30.php...

} elseif ($par_src_index == "lp_rel_no") {

	//Landing page de la Relance Hors Ouvreurs (non ouvreurs)
	include $par_fichier_page_lp_rel_no; //10.php, 20.php, 30.php...

} elseif ($par_src_index == "lp_rel_o") {

	//Landing page de la Relance Ouvreurs
	include $par_fichier_page_lp_rel_o; //10.php, 20.php, 30.php...

} elseif ($par_src_index == "lp_rel_ncl") {

	//Landing page de la Relance Hors Cliqueurs (non cliqueurs)
	include $par_fichier_page_lp_rel_ncl; //10.php, 20.php, 30.php...

} elseif ($par_src_index == "lp_rel_cl") {

	//Landing page de la Relance Cliqueurs
	include $par_fichier_page_lp_rel_cl; //10.php, 20.php, 30.php...

} elseif ($par_src_index == "lp_rel_nco") {

	//Landing page de la Relance Hors Coupons (non couponneurs)
	include $par_fichier_page_lp_rel_nco; //10.php, 20.php, 30.php...

} elseif ($par_src_index == "lp_rel_co") {

	//Landing page de la Relance Coupons
	include $par_fichier_page_lp_rel_co; //10.php, 20.php, 30.php...

} elseif ($par_src_index == "lp_rel_oncl") {

	//Landing page de la Relance Ouvreurs Hors Cliqueurs
	include $par_fichier_page_lp_rel_oncl; //10.php, 20.php, 30.php...

} elseif ($par_src_index == "mail") {

	//Mail Initial par défaut
	include $par_fichier_mail_initial;

} else {

	//mail initial par défaut
	include $par_fichier_mail_initial;

}
