<?php
/*
 * TemplateName: standard_solo_GLOBAL
 *
 * @version: 1.3 - 01/2018
 */
define('TEMPLATE_VERSION', '1.3');//version du template

/*FIX2009-11-26*/ include_once('/home/verticalmail/includes.php');
session_start();

/*
 * ----------------------------------------
 * Paramètres : GENERAL
 * ----------------------------------------
 */
	$par_annonceur	= "Nespresso"; //Nom de l'annonceur dans la fiche OP de l'extranet (champ "Description")
	$par_operation	= "solonesp2206_priam_jeu"; //Numéro de l'OP dans la fiche OP de l'extranet (champ "Id Operation")
	$par_operation_client = ""; //Code OP du client apparent dans le par_formname

	$par_operation_client_tracking = "utm_source=Email&utm_medium=EM&utm_campaign=NET&utm_cd62=B2C&utm_cd63=LOC&utm_cd65=Jeu-Concours-PRM&utm_id=c6b5fb45-5552-45f7-bbeb-36577e468bb2"; // Tracking MAIL CTL

	$par_operation_client_tracking2 ="utm_source=Email&utm_medium=EM&utm_campaign=NET&utm_cd62=B2C&utm_cd63=LOC&utm_cd65=Sans-code&utm_id=0a669dc1-232c-4606-a3cf-f5861ed156cc"; // Tracking Post CTA


	/*
	 * DEST :
	 * - Dans le cas d'un mail avec redirection externe sans LP (formulaire) le dest reste en "test"
	 * - Dans tous les autres cas avant l'envoie du BAT "CLIENT" le dest doit être modifié en dest réel du client
		(Info dans le champ "Email Desti. Form" de la fiche OP de l'extranet)
	 */
    // $par_dest[1]	= "test";
	$par_dest[1] 	= "nespresso";//valeur du client rempli dans le champ "Email Desti. Form" de l'extranet

	/*
	 * Relance Cliqueurs Automatique : fichier relance_cliqueurs.php
	 * /!\ Ne pas oublié de créer le fichier du logo (visuals/logo.gif) + le fichier link_lp.php
	 */
	$par_annonceur_rel_cliqueur = $par_annonceur; //Nom de l'annonceur
	$par_annonceur_rel_cliqueur = "Custom"; //Nom de l'annonceur custom

/* FIN des Paramètres : GENERAL ---------- */


/*
 * ----------------------------------------
 * Paramètres : TRADUCTION MULTI-LANGUES ou MONO-LANGUE
 *
 * Liste des choix de langue de la variable $par_langue : 'fr_FR' Francais, 'en_EN' Anglais, 'es_ES' Espagnol
 *
 * A noter : les caractères minuscule correspond à la langue et les caractères majuscule au pays
 * Il est possible dans ajouter dans le dossier "langues_traductions"
 * ----------------------------------------
 */
	/*
	 * -------- TRADUCTION DU TEMPLATE FRONT-OFFICE : Générale --------
	 *
	 * La variable $par_langue est définie sur chaque page du front-office avant l'appel du fichier paramètres.inc :
	 * LP (10.php, 10_txt.php), Confirmation (good.php), Mail confirmation (autoreply.php)
	 * Mail Intitial (mail.php), Mail Texte (index_txt.php) + RELANCE
	 * Liens (link.php, link_cta.php, link_cta_lp.php, link_cta_on_slide.php, link_ctl.php, link_good_brochure.php, link_good_site.php, link_ics.php)
	 * Transfert (transf.php, transfok.php) + mailit_solo_globale_with_ctl_transfert_2017
	 *
	 * SI OP MONO-LANGUE :
	 * On modifie uniquement la variable $par_langue dans chaque fichier détailler au-dessus
	 * Par défaut : $par_langue = 'fr_FR';//langue de la page fr_FR, en_EN, es_ES
	 *
	 * SI OP MULTI-LANGUES :
	 * On modifie aussi la variable $par_langue = 'fr_FR'; dans chaque fichiers
	 * et on renomme le fichier comme dans l'exemple ci-dessous
	 * ex: on a une OP multilangue francais et anglais
	 * le fichier 10.php est renommer 10-fr_FR.php et sa variable est $par_langue = 'fr_FR';
	 * puis on enregistre sous fichier 10-fr_FR.php pour le renommer 10-en_EN.php et sa variable est $par_langue = 'en_EN';
	 * on fait cela pour tous les fichier qui comporte la variable $par_langue citer au-dessus
	 * puis on configure ci-dessous tous les zones ou l'on fait mention d'un commentaire : SI OP MULTI-LANGUES
	 * A noter : Que l'OP soit Mono-Langue ou Multi-Langues les textes spécifiques à l'OP sont inscrit en dur dans les fichiers
	 */

	// Si des traduction sont spécifique à l'OP modifier le chemin du fichier commun vers la traduction spécifique a l'op
	include_once('../include/standard_solo_global/langues_traductions/lang-'. $par_langue .'.inc');//Appel du fichier de traduction commun
	// include_once('langues_traductions/lang-'.$par_langue.'.inc'); //Appel du fichier de traduction spécifique a l'op


	/*
	 * -------- TRADUCTION DU TEMPLATE BACK-OFFICE : Coupons uniquement --------
	 *
	 * ex: si $par_langue_coupons = 'fr_FR'; on va chercher le fichier "lang-fr_FR-coupons.inc"
	 * A noter : Il y a qu'une seule langue pour toute l'OP
	 */
	$par_langue_coupons = 'fr_FR';//fr_FR ou en_EN

	// Si des traduction sont spécifique à l'OP modifier le chemin du fichier commun vers la traduction spécifique a l'op
	include_once('../include/standard_solo_global/langues_traductions/lang_coupons-'. $par_langue_coupons .'.inc');//Appel du fichier de traduction commun
	// include_once('langues_traductions/lang_coupons-'.$par_langue_coupons.'.inc'); //Appel du fichier de traduction spécifique a l'op

/* FIN des Paramètres : TRADUCTION MULTI-LANGUES ---------- */


/*
 * ----------------------------------------
 * Paramètres : TITRE DE L'OP
 *
 * Variables afficher dans le head des fichiers front-office (landing page, confirmation transfert...) et mails (initials, txt, autoreply...)
 * $par_description : head > meta property="og:description"
 * $par_title : head > title
 * A noter : Ne pas oublier d'encoder les caractères spécifiques
 * ----------------------------------------
 */
	/* SI OP MONO-LANGUE */
	$par_description = "Grand jeu Nespresso Vertuo & Barista  ";//encoder les caractères spéciaux

	/* SI OP MULTI-LANGUES */
	/*
	if ($par_langue == 'fr_FR') {
		$par_description = "Titre en francais";
	}
	if ($par_langue == 'en_EN') {
		$par_description = "Titre en anglais";
	}
	if ($par_langue == 'es_ES') {
		$par_description = "Titre en espagnol";
	}
	*/

	$par_title = $par_annonceur;

/* FIN des Paramètres : TITRE DE L'OP ---------- */


/*
 * ----------------------------------------
 * Paramètres : DOMAINE DE L'OP
 * ----------------------------------------
 */

	/*
	 * INDEX DE L'OP EN LIGNE :
	 * "mail" 			Mail Initial
	 * "lp" 			Landing page du Mail Initial
	 * "lp_rel" 		Landing page de la Relance Unique
	 * "lp_rel_o" 		Landing page de la Relance Ouvreurs
	 * "lp_rel_no" 		Landing page de la Relance Hors Ouvreurs (non ouvreurs)
	 * "lp_rel_cl" 		Landing page de la Relance Cliqueurs
	 * "lp_rel_ncl" 	Landing page de la Relance Hors Cliqueurs (non cliqueurs)
	 * "lp_rel_co" 		Landing page de la Relance Coupons
	 * "lp_rel_nco" 	Landing page de la Relance Hors Coupons (non couponneurs)
	 * "lp_rel_oncl" 	Landing page de la Relance Ouvreurs Hors Cliqueurs
	 */
	$par_src_index = "lp";

	/*
	 * DOMAINE DE L'OP :
	 */
	$par_domaine = "VM"; //"VM" ou "CLIENT"
	$par_nom_domaine_vm = "https://www.vertical-mail.com";//SI VM
	$par_nom_domaine_client = "http://www.domaine_du_client.com";//SI CLIENT

	/*
	 * Fichiers pour les liens mirroir et tracking + index
	 */
	// Mail Initiale
	$par_fichier_mail_initial 		= 'mail.php'; //link_mirror.php et index si variable $par_src_index = "mail"
	$par_fichier_page_lp 			= '10.php';//10.php, 20.php, 30.php... Landing page du Mail Initial - dans tous les fichier commencant par link_lp_ + index.php

	// Relance Unique (fichiers dans dossier _++/cas_modele__RELANCES CREA)
	$par_fichier_relance 			= 'relance.php'; //link_mirror_rel.php et index si variable $par_src_index = "lp_rel"
	$par_fichier_page_lp_rel 		= '20.php';//10.php, 20.php, 30.php... Landing page de la Relance Unique

	// Relance Ouvreurs (fichiers dans dossier _++/cas_modele__RELANCES CREA)
	$par_fichier_relance_o 			= 'relance_o.php'; //link_mirror_rel_o.php et index si variable $par_src_index = "lp_rel_o"
	$par_fichier_page_lp_rel_o 		= '20.php';//10.php, 20.php, 30.php... Landing page de la Relance Ouvreur

	// Relance Hors Ouvreurs (non ouvreurs) (fichiers dans dossier _++/cas_modele__RELANCES CREA)
	$par_fichier_relance_no 		= 'relance_no.php';//link_mirror_rel_no.php et index si variable $par_src_index = "lp_rel_no"
	$par_fichier_page_lp_rel_no 	= '20.php';//10.php, 20.php, 30.php... Landing page de la Relance Hors Ouvreurs (non ouvreurs)

	// Relance Cliqueurs (fichiers dans dossier _++/cas_modele__RELANCES CREA)
	$par_fichier_relance_cl 		= 'relance_cl.php';//link_mirror_rel_cl.php et index si variable $par_src_index = "lp_rel_cl"
	$par_fichier_page_lp_rel_cl 	= '20.php';//10.php, 20.php, 30.php... Landing page de la Relance Cliqueurs

	// Relance Hors Cliqueurs (non cliqueurs) (fichiers dans dossier _++/cas_modele__RELANCES CREA)
	$par_fichier_relance_ncl 		= 'relance_ncl.php';//link_mirror_rel_ncl.php et index si variable $par_src_index = "lp_rel_ncl"
	$par_fichier_page_lp_rel_ncl 	= '20.php';//10.php, 20.php, 30.php... Landing page de la Relance Hors Cliqueurs (non cliqueurs)

	// Relance Coupons (fichiers dans dossier _++/cas_modele__RELANCES CREA)
	$par_fichier_relance_co 		= 'relance_co.php';//link_mirror_rel_co.php et index si variable $par_src_index = "lp_rel_co"
	$par_fichier_page_lp_rel_co 	= '20.php';//10.php, 20.php, 30.php... Landing page de la Relance Coupons

	// Relance Hors Coupons (non couponneurs) (fichiers dans dossier _++/cas_modele__RELANCES CREA)
	$par_fichier_relance_nco 		= 'relance_nco.php';//link_mirror_rel_nco.php et index si variable $par_src_index = "lp_rel_nco"
	$par_fichier_page_lp_rel_nco 	= '20.php';//10.php, 20.php, 30.php... Landing page de la Relance Hors Coupons (non couponneurs)

	// Relance Ouvreurs Hors Cliqueurs (fichiers dans dossier _++/cas_modele__RELANCES CREA)
	$par_fichier_relance_oncl 		= 'relance_oncl.php';//link_mirror_rel_oncl.php et index si variable $par_src_index = "lp_rel_oncl"
	$par_fichier_page_lp_rel_oncl 	= '20.php';//10.php, 20.php, 30.php... Landing page de la Relance Ouvreurs Hors Cliqueurs

/* FIN des Paramètres : DOMAINE DE L'OP ---------- */

/*
 * ----------------------------------------
 * SPECIFICITE DU CLIENT :
 * ----------------------------------------
 */
	// ici le code spécifique au client
	// ex : couleur du template (hec)

	/* -------- LIEN EXTERNE URL ou DOCS -------- */
	// LIEN vers le Site - url du site complet : good, autoreply
	$par_lien_site = "https://www.nespresso.com/fr/fr/acquisition-remise-10-euros?v=co&utm_source=Email&utm_medium=EM&utm_campaign=B2C_RETENTION&utm_cd62=B2C&utm_cd63=LOC&utm_cd65=prm04rem10-animexpert&utm_id=520ed7d7-98a4-4e4e-839b-d10c36897ecb";//si vide non visible
	$par_nom_site = "www.xxxxxxxxxxxx.com";

	// LIEN vers la Brochure/Catalogue - nomdufichier.php : good, autoreply
	$par_lien_brochure 	= "brochure.pdf";//si vide non visible
	// $par_nom_brochure 	= "";

	//LIEN vers les Réseaux Sociaux : good, autoreply (fichiers dans dossier _++/cas_modele__LIENS RESEAUX SOCIAUX)
	$par_reseaux_active 	= true;//true/false	si vide non visible pour tous les reseaux
	$par_nom_reseaux 		= "Pour&nbsp;nous&nbsp;suivre&nbsp;:";//si vide non visible
	$par_lien_facebook 		= "";//si vide non visible
	$par_lien_googleplus 	= "";//si vide non visible
	$par_lien_twitter 		= "";//si vide non visible
	$par_lien_pinterest 	= "";//si vide non visible
	$par_lien_youtube 		= "";//si vide non visible
	$par_lien_instagram 	= "";//si vide non visible
	$par_lien_vimeo 		= "";//si vide non visible
	$par_lien_linkedin 		= "";//si vide non visible
	$par_lien_viadeo 		= "";//si vide non visible


	/* -------- NOM DES CONTACTS - good & autoreply -------- */
	// ENCODER LES CARACTERES SAUF POUR contact_autoreply PAS D'ACCENT (expéditeur autoreply)
	$contacts = array (
		'contact_1' => array (
			'contact_ville'		=> "ville_1",//Nom de la ville pour récurérer les coordonnées : ville_1, ville_2
			'contact_nom'		=> "Pr&eacute;nom NOM",//Pr&eacute;nom NOM > signature de la page good
			'contact_poste'		=> "Nom du poste du contact",//Nom du poste du contact > signature de la page good
			'contact_tel'		=> "1 00 00 00 00",//sans +33 (0)		1 00 00 00 00
			'contact_port'		=> "6 00 00 00 00",//sans +33 (0)		6 00 00 00 00
			'contact_mail'		=> "xxx@xxxx.com",//xxx@xxxx.com

			'contact_autoreply'	=> "Prenom Nom de Societe",//Prenom Nom de Societe	/ sans accent > signature de mail et expéditeur du mail si configurer ($autoresp_from)
		),
		/*
		'contact_2' => array (
			'contact_ville'		=> "ville_2",//Nom de la ville pour récurérer les coordonnées : ville_1, ville_2
			'contact_nom'		=> "Pr&eacute;nom NOM",//Pr&eacute;nom NOM > signature de la page good
			'contact_poste'		=> "Nom du poste du contact",//Nom du poste du contact > signature de la page good
			'contact_tel'		=> "1 00 00 00 00",//sans +33 (0)		1 00 00 00 00
			'contact_port'		=> "6 00 00 00 00",//sans +33 (0)		6 00 00 00 00
			'contact_mail'		=> "xxx@xxxx.com",//xxx@xxxx.com

			'contact_autoreply'	=> "Prenom Nom de Societe",//Prenom Nom de Societe	/ sans accent > signature de mail et expéditeur du mail si configurer ($autoresp_from)
		),
		*/
	);

	// activer les contacts sur la good
	$contact_etat_1					= "true"; //true/false
	// $contact_etat_2					= "true"; //true/false

	// activer les contacts sur l'autoreply
	$contact_autoreply_etat_1		= "true"; //true/false
	// $contact_autoreply_etat_2	= "true"; //true/false


	/* -------- INFOS LIEU utilisé pour les évènements -------- */
	$lieux = array (
		'ville_1' => array (
			'lieu_nom'			=> "Nom du lieu 1",
			// 'lieu_titre'		=> "NOM Ville 1",
			'lieu_adresse'		=> "5 rue de la terrasse<br />00000 VILLE 1",//ics
			'lieu_adresse2'	=> "5 rue de la terrasse - 00000 VILLE 1",//good, autoreply
			'lieu_map'			=> "https://www.google.fr/maps/place/5+Rue+de+la+Terrasse,+75017+Paris/data=!4m2!3m1!1s0x47e66fb9fdd95047:0x65f24828a897c5eb?sa=X&ved=0ahUKEwiL_b6g88bSAhVEBsAKHW9iCvkQ8gEIGzAA" //link_plan_acces_ville_1.php4
		),
		'ville_2' => array (
			'lieu_nom'			=> "Nom du lieu 2",
			// 'lieu_titre'		=> "NOM Ville 2",
			'lieu_adresse'		=> "5 rue de la terrasse<br />00000 VILLE 2",//ics
			'lieu_adresse2'	=> "5 rue de la terrasse - 00000 VILLE 2",//good, autoreply
			'lieu_map'			=> "https://www.google.fr/maps/place/5+Rue+de+la+Terrasse,+75017+Paris/data=!4m2!3m1!1s0x47e66fb9fdd95047:0x65f24828a897c5eb?sa=X&ved=0ahUKEwiL_b6g88bSAhVEBsAKHW9iCvkQ8gEIGzAA" //link_plan_acces_ville_2.php4
		),
		// le modèle "ville_1" ou "ville_2" peut être dupliqué en changent le numéro par ordre croissant
		// ne pas oublier d'adapté les modifs sur les evts au niveau du commentaire "Adresse de chaque évènement"
		// + les fichiers à dupliquer et adapter : link_plan_acces_ville_1.php4 & link_ics_date_1.php
	);


	/* -------- DATES EVENEMENTS (qualif5 dans soloform, good, autoreply...) -------- */
	// Date visible ou non dans les formulaires : solo_form, index_txt et les relances si besoins
	$nombre_reunion = '1'; //nombre de réunion

	// Titre des evts dans le formulaire
	$par_form_evts_txt 	= "Participer à un événement&nbsp;:";//solo_form

	// solo_form
	$reunion_etat_1 = "true"; //true/false
	$reunion_etat_2 = "true"; //true/false

	// index_txt
	// $reunion_etat_txt_1 = "false";//true/false
	// $reunion_etat_txt_2 = "false";//true/false

	// relances
	// $reunion_etat_relance_1 = "false";//true/false
	// $reunion_etat_relance_2 = "false";//true/false

	//dates des évènements
	$reunions = array (
		'reunion_1' => array (
			'ville'				=> "Ville 1",//Ville 1 - Ville 2 - Si VIDE PAS D'INFO DE LIEU (adresse, plan d'accès...)
			'reunion'			=> "Mardi 21 février 2017 de 18h30 &agrave;&nbsp;20h00 - VILLE1",//solo_form - ex : Lundi 3 janvier 2017 de 11h30 &agrave;&nbsp;12h30 - LILLE
			'date'				=> "Mardi 21 Février 2017",//good, autoreply - ex : Lundi 3 Janvier 2017
			'heure'				=> "&Agrave; 18h30",//good, autoreply - ex : &Agrave; 11h30
			'value'				=> "Mardi 21 fevrier 2017 a 18h30",//PAS D'ACCENT - solo_form, mailit, good - ex : Lundi 3 janvier 2017 a 11h30
			'date_min'			=> "mardi 21 février",//relance_couponeur.php4, link2_rlc_1.php4, link2_rlc_2.php4 - ex : lundi 3 janvier
			'date_min_maj'		=> "Mardi 21 Février",//relance_couponeur.php4, link2_rlc_1.php4, link2_rlc_2.php4 - ex : Lundi 3 Janvier
			'heure_min'			=> "&agrave; 18h30",//relance_couponeur.php4, link2_rlc_1.php4, link2_rlc_2.php4 - ex : &agrave; 11h30
			'jour_mois'			=> "21 février",//index_txt.php4 - ex : 3 janvier
			'icsName'			=> "NOMCLIENT_RI_"."21"."02"."2017",//ex : NOMCLIENT_RI_21032017
			'icsDates'			=> "21/02/2017 18:30",//ex : 08/03/2017 11:30
			'endDate'			=> "21/02/2017 20:00",//ex : 08/03/2017 12:30
			'objet_ics'			=> "NOM DU CLIENT : Reunion d'information",//PAS D'ACCENT
			'titre_good'		=> "Vous avez choisi d'assister à notre réunion d'information, voici les informations pratiques :",//ggod
		),
		'reunion_2' => array (
			'ville'				=> "Ville 2",//Ville 1 - Ville 2 - Si VIDE PAS D'INFO DE LIEU (adresse, plan d'accès...)
			'reunion'			=> "Mercredi 8 mars 2017 de 18h30 &agrave;&nbsp;20h00 - VILLE2",//solo_form - ex : Lundi 3 janvier 2017 de 11h30 &agrave;&nbsp;12h30 - LILLE
			'date'				=> "Mercredi 8 Mars 2017",//good, autoreply - ex : Lundi 3 Janvier 2017
			'heure'				=> "&Agrave; 18h30",//good, autoreply - ex : &Agrave; 11h30
			'value'				=> "Mercredi 8 mars 2017 a 18h30",//PAS D'ACCENT - solo_form, mailit, good - ex : Lundi 3 janvier 2017 a 11h30
			'date_min'			=> "mercredi 8 mars",//relance_couponeur.php4, link2_rlc_1.php4, link2_rlc_2.php4 - ex : lundi 3 janvier
			'date_min_maj'		=> "Mercredi 8 Mars",//relance_couponeur.php4, link2_rlc_1.php4, link2_rlc_2.php4 - ex : Lundi 3 Janvier
			'heure_min'			=> "&agrave; 18h30",//relance_couponeur.php4, link2_rlc_1.php4, link2_rlc_2.php4 - ex : &agrave; 11h30
			'jour_mois'			=> "8 mars",//index_txt.php4 - ex : 3 janvier
			'icsName'			=> "NOMCLIENT_RI_"."08"."03"."2017",//ex : NOMCLIENT_RI_21032017
			'icsDates'			=> "08/03/2017 18:30",//ex : 08/03/2017 11:30
			'endDate'			=> "08/03/2017 20:00",//ex : 08/03/2017 12:30
			'objet_ics'			=> "NOM DU CLIENT : Reunion d'information",//PAS D'ACCENT
			'titre_good'		=> "Vous avez choisi d'assister à notre réunion d'information, voici les informations pratiques :",//ggod
		),
		//le modèle "reunion_1" ou "reunion_2" peut être dupliqué en changent le numéro par ordre croissant
	);

	// Adresse de chaque évènement
	// Si le modèle "reunion_1" est dupliqué on ajustera le code ci-dessous
	// les valeurs de "ville" possible sont a répercuter aussi - ex : Ville 1 - Ville 2 + dans good et les autoreplys avec des dates
	// si aucune modif du nombre d'évènement ou de la liste des villes ne pas toucher
		if ( $reunions["reunion_1"]["ville"] == "Ville 1" ) {
			$reunion_adresse_1 		= $lieux["ville_1"]["lieu_adresse"]; //ICS
			$reunion_adresse2_1 	= $lieux["ville_1"]["lieu_adresse2"]; //good, autoreply
			$reunion_map_1 			= $lieux["ville_1"]["lieu_map"];//ICS
			$reunion_lieu_nom_1		= $lieux["ville_1"]["lieu_nom"];//ICS, good, autoreply
		} else if ( $reunions["reunion_1"]["ville"] == "Ville 2" ) {
			$reunion_adresse_1 		= $lieux["ville_2"]["lieu_adresse"]; //ICS
			$reunion_adresse2_1 	= $lieux["ville_2"]["lieu_adresse2"]; //good, autoreply
			$reunion_map_1 			= $lieux["ville_2"]["lieu_map"];//ICS
			$reunion_lieu_nom_1		= $lieux["ville_2"]["lieu_nom"];//ICS, good, autoreply
		}

		if ( $reunions["reunion_2"]["ville"] == "Ville 1" ) {
			$reunion_adresse_2 		= $lieux["ville_1"]["lieu_adresse"]; //ICS
			$reunion_adresse2_2 	= $lieux["ville_1"]["lieu_adresse2"]; //good, autoreply
			$reunion_map_2 			= $lieux["ville_1"]["lieu_map"];//ICS
			$reunion_lieu_nom_2		= $lieux["ville_1"]["lieu_nom"];//ICS, good, autoreply
		} else if ( $reunions["reunion_2"]["ville"] == "Ville 2" ) {
			$reunion_adresse_2 		= $lieux["ville_2"]["lieu_adresse"]; //ICS
			$reunion_adresse2_2 	= $lieux["ville_2"]["lieu_adresse2"]; //good, autoreply
			$reunion_map_2 			= $lieux["ville_2"]["lieu_map"];//ICS
			$reunion_lieu_nom_2		= $lieux["ville_2"]["lieu_nom"];//ICS, good, autoreply
		}
		//fin de ne pas toucher

 /* FIN des SPECIFICITE DU CLIENT ---------- */


/*
 * ----------------------------------------
 * Paramètres : MENTIONS & COPYRIGHT VM
 * ----------------------------------------
 */
	/*
	 * Afficher ou Masquer "Vertical-Mail® - Tous droits réservés©" si la création est de VM pour le mail initial ou la landing page
	 * A noter : la mention "Vertical-Mail® - Tous droits réservés©" est présente sur les pages de transfert (transf et transfok)
	 */

	// Vertical-Mail® - Tous droits réservés© sur le mail initial
	$vmCrea_mail 		= false; //AFFICHER (true) ou MASQUER (false)

	// Vertical-Mail® - Tous droits réservés© sur la landing page et la page de confirmation (good)
	$vmCrea_landing 	= false; //AFFICHER (true) ou MASQUER (false)

	// Mention légale Vertical-Mail sur la landing page a activer si la BDD du routage est à VM
	$vmMention_landing 	= true; //AFFICHER (true) ou MASQUER (false)
	$vmMention_landing_fichier_name = "nespresso.inc"; // ../include/mentions/'.$vmMention_landing_fichier_name

/* FIN des Paramètres : MENTIONS & COPYRIGHT VM ---------- */


/*
 * ----------------------------------------
 * Paramètres : MAIL & RELANCES
 * ----------------------------------------
 */
	/*
	 * MAIL INITIALE (mail.php ou mail_client.php)
	 */
	$_width 				= "640"; //Largeur du mail		640
	$_bgcolor 				= "#ffffff"; //Couleur du fond du mail
	$_clrmention 			= "#333333"; //Couleur des mentions légales (mail + version texte)

	/* -------- HEADER DU MAIL INITIALE dans le lien mirroir -------- */
	$accroche_mirroir_etat = true;//true = Visible / false = Non visible > /!\ ne pas oublié de remettre le lien caché header après un texte (https://www.vertical-mail.com/scan/header.html)

	/* SI OP MONO-LANGUE */
	//Par défaut si non custom
	// $accroche_mirroir = "[[RULE:1]], si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	//Custom : concerver si custom "<br />Si..." a la fin
	// $accroche_mirroir = "[[RULE:1]], " . "Texte d'accroche du lien mirroir" . "<br />Si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	/* SI OP MULTI-LANGUES */
	/*
	if ($par_langue == 'fr_FR') {
		//Par défaut si non custom
		//$accroche_mirroir = "[[RULE:1]], si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

		//Custom : concerver si custom "<br />Si..." a la fin
		$accroche_mirroir = "[[RULE:1]]," . "Texte d'accroche du lien mirroir en francais" . "<br />Si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";
	}
	if ($par_langue == 'en_EN') {
		//Par défaut si non custom
		//$accroche_mirroir = "[[RULE:1]], if you cannot see this page correctly, <a href=\"link_mirror.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">please click here</font></a>";

		//Custom : concerver si custom "<br />Si..." a la fin
		$accroche_mirroir = "[[RULE:1]]," . "Texte d'accroche du lien mirroir en anglais" . "<br />If you cannot see this page correctly, <a href=\"link_mirror.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">please click here</font></a>";
	}
	if ($par_langue == 'es_ES') {
		//Par défaut si non custom
		//$accroche_mirroir = "[[RULE:1]], Si no puede ver est&aacute; p&aacute;gina correctamente, por favor <a href=\"link_mirror.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">haga clic aqu&iacute;</font></a>";

		//Custom : concerver si custom "<br />Si..." a la fin
		$accroche_mirroir = "[[RULE:1]]," . "Texte d'accroche du lien mirroir en espagnol" . "<br />Si no puede ver est&aacute; p&aacute;gina correctamente, por favor <a href=\"link_mirror.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">haga clic aqu&iacute;</font></a>";
	}
	*/


	/*
	 * RELANCE Unique (relance.php ou relance_client.php)
	 */
	$_width_relance 			= "640"; //Largeur du mail		640
	$_bgcolor_relance 			= "#FFFFFF"; //Couleur du fond du mail
	$_clrmention_relance		= "#333333"; //Couleur des mentions légales (mail + version texte)

	/* -------- HEADER DES RELANCES CREA dans le lien mirroir -------- */
	$accroche_mirroir_rel_etat = true;//true = Visible / false = Non visible > /!\ ne pas oublié de remettre le lien caché header après un texte (https://www.vertical-mail.com/scan/header.html)

	/* SI OP MONO-LANGUE */
	// RELANCE UNIQUE Par défaut si non custom
	$accroche_mirroir_rel = "[[RULE:1]], si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\" style=\"color:{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	// RELANCE UNIQUE Custom : concerver si custom "<br />Si..." a la fin
	// $accroche_mirroir_rel = "[[RULE:1]], " . "Texte d'accroche du lien mirroir" . "<br />Si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	/* SI OP MULTI-LANGUES reprendre modèle du mail initial en changent la variable et le nom du fichier */


	/*
	 * RELANCE Ouvreurs _o
	 */
	$_width_relance_o 			= "640"; //Largeur du mail		640
	$_bgcolor_relance_o 		= "#FFFFFF"; //Couleur du fond du mail
	$_clrmention_relance_o		= "#333333"; //Couleur des mentions légales (mail + version texte)

	/* -------- HEADER DES RELANCES CREA dans le lien mirroir -------- */
	$accroche_mirroir_rel_o_etat = true;//true = Visible / false = Non visible > /!\ ne pas oublié de remettre le lien caché header après un texte (https://www.vertical-mail.com/scan/header.html)

	/* SI OP MONO-LANGUE */
	// RELANCE OUVREUR Par défaut si non custom
	$accroche_mirroir_rel_o = "[[RULE:1]], si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_o.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	// RELANCE NON OUVREUR Custom : concerver si custom "<br />Si..." a la fin
	// $accroche_mirroir_rel_o = "[[RULE:1]], " . "Texte d'accroche du lien mirroir" . "<br />Si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_o.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	/* SI OP MULTI-LANGUES reprendre modèle du mail initial en changent la variable et le nom du fichier */


	/*
	 * RELANCE Hors Ouvreurs (non ouvreurs) _no
	 */
	$_width_relance_no 			= "640"; //Largeur du mail		640
	$_bgcolor_relance_no 		= "#FFFFFF"; //Couleur du fond du mail
	$_clrmention_relance_no		= "#333333"; //Couleur des mentions légales (mail + version texte)

	/* -------- HEADER DES RELANCES CREA dans le lien mirroir -------- */
	$accroche_mirroir_rel_no_etat = true;//true = Visible / false = Non visible > /!\ ne pas oublié de remettre le lien caché header après un texte (https://www.vertical-mail.com/scan/header.html)

	/* SI OP MONO-LANGUE */
	// RELANCE NON OUVREUR Par défaut si non custom
	$accroche_mirroir_rel_no = "[[RULE:1]], si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_no.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	// RELANCE NON OUVREUR Custom : concerver si custom "<br />Si..." a la fin
	// $accroche_mirroir_rel_no = "[[RULE:1]], " . "Texte d'accroche du lien mirroir" . "<br />Si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_no.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	/* SI OP MULTI-LANGUES reprendre modèle du mail initial en changent la variable et le nom du fichier */


	/*
	 * RELANCE Cliqueurs _cl
	 */
	$_width_relance_cl 			= "640"; //Largeur du mail		640
	$_bgcolor_relance_cl 		= "#dddddd"; //Couleur du fond du mail
	$_clrmention_relance_cl		= "#333333"; //Couleur des mentions légales (mail + version texte)

	/* -------- HEADER DES RELANCES CREA dans le lien mirroir -------- */
	$accroche_mirroir_rel_cl_etat = true;//true = Visible / false = Non visible > /!\ ne pas oublié de remettre le lien caché header après un texte (https://www.vertical-mail.com/scan/header.html)

	/* SI OP MONO-LANGUE */
	// RELANCE NON OUVREUR Par défaut si non custom
	$accroche_mirroir_rel_cl = "[[RULE:1]], si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_cl.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	// RELANCE NON OUVREUR Custom : concerver si custom "<br />Si..." a la fin
	// $accroche_mirroir_rel_cl = "[[RULE:1]], " . "Texte d'accroche du lien mirroir" . "<br />Si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_cl.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	/* SI OP MULTI-LANGUES reprendre modèle du mail initial en changent la variable et le nom du fichier */


	/*
	 * RELANCE Hors Cliqueurs (non cliqueurs) _ncl
	 */
	$_width_relance_ncl 		= "640"; //Largeur du mail		640
	$_bgcolor_relance_ncl 		= "#dddddd"; //Couleur du fond du mail
	$_clrmention_relance_ncl	= "#333333"; //Couleur des mentions légales (mail + version texte)

	/* -------- HEADER DES RELANCES CREA dans le lien mirroir -------- */
	$accroche_mirroir_rel_ncl_etat = true;//true = Visible / false = Non visible > /!\ ne pas oublié de remettre le lien caché header après un texte (https://www.vertical-mail.com/scan/header.html)

	/* SI OP MONO-LANGUE */
	// RELANCE NON OUVREUR Par défaut si non custom
	$accroche_mirroir_rel_ncl = "[[RULE:1]], si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_ncl.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	// RELANCE NON OUVREUR Custom : concerver si custom "<br />Si..." a la fin
	// $accroche_mirroir_rel_ncl = "[[RULE:1]], " . "Texte d'accroche du lien mirroir" . "<br />Si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_ncll.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	/* SI OP MULTI-LANGUES reprendre modèle du mail initial en changent la variable et le nom du fichier */


	/*
	 * RELANCE Coupons _co
	 */
	$_width_relance_co 			= "640"; //Largeur du mail		640
	$_bgcolor_relance_co 		= "#FFFFFF"; //Couleur du fond du mail
	$_clrmention_relance_co		= "#333333"; //Couleur des mentions légales (mail + version texte)

	/* -------- HEADER DES RELANCES CREA dans le lien mirroir -------- */
	$accroche_mirroir_rel_co_etat = true;//true = Visible / false = Non visible > /!\ ne pas oublié de remettre le lien caché header après un texte (https://www.vertical-mail.com/scan/header.html)

	/* SI OP MONO-LANGUE */
	// RELANCE NON OUVREUR Par défaut si non custom
	$accroche_mirroir_rel_co = "[[RULE:1]], si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_co.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	// RELANCE NON OUVREUR Custom : concerver si custom "<br />Si..." a la fin
	// $accroche_mirroir_rel_co = "[[RULE:1]], " . "Texte d'accroche du lien mirroir" . "<br />Si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_co.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	/* SI OP MULTI-LANGUES reprendre modèle du mail initial en changent la variable et le nom du fichier */


	/*
	 * RELANCE Hors Coupons (non couponneurs) _nco
	 */
	$_width_relance_nco 		= "640"; //Largeur du mail		640
	$_bgcolor_relance_nco 		= "#FFFFFF"; //Couleur du fond du mail
	$_clrmention_relance_nco	= "#333333"; //Couleur des mentions légales (mail + version texte)

	/* -------- HEADER DES RELANCES CREA dans le lien mirroir -------- */
	$accroche_mirroir_rel_nco_etat = true;//true = Visible / false = Non visible > /!\ ne pas oublié de remettre le lien caché header après un texte (https://www.vertical-mail.com/scan/header.html)

	/* SI OP MONO-LANGUE */
	// RELANCE NON OUVREUR Par défaut si non custom
	$accroche_mirroir_rel_nco = "[[RULE:1]], si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_nco.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	// RELANCE NON OUVREUR Custom : concerver si custom "<br />Si..." a la fin
	// $accroche_mirroir_rel_nco = "[[RULE:1]], " . "Texte d'accroche du lien mirroir" . "<br />Si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_nco.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	/* SI OP MULTI-LANGUES reprendre modèle du mail initial en changent la variable et le nom du fichier */


	/*
	 * RELANCE Ouvreurs Hors Cliqueurs _oncl
	 */
	$_width_relance_oncl 		= "640"; //Largeur du mail		640
	$_bgcolor_relance_oncl 		= "#FFFFFF"; //Couleur du fond du mail
	$_clrmention_relance_oncl	= "#333333"; //Couleur des mentions légales (mail + version texte)

	/* -------- HEADER DES RELANCES CREA dans le lien mirroir -------- */
	$accroche_mirroir_rel_oncl_etat = true;//true = Visible / false = Non visible > /!\ ne pas oublié de remettre le lien caché header après un texte (https://www.vertical-mail.com/scan/header.html)

	/* SI OP MONO-LANGUE */
	// RELANCE NON OUVREUR Par défaut si non custom
	$accroche_mirroir_rel_oncl = "[[RULE:1]], si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_oncl.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	// RELANCE NON OUVREUR Custom : concerver si custom "<br />Si..." a la fin
	// $accroche_mirroir_rel_oncl = "[[RULE:1]], " . "Texte d'accroche du lien mirroir" . "<br />Si&nbsp;ce message ne s'affiche pas correctement, <a href=\"link_mirror_rel_oncl.php\" target=\"_blank\" class=\"tracking\" id=\"link-01\"><font color=\"{$_clrmention}\">consultez-le en&nbsp;ligne</font></a>";

	/* SI OP MULTI-LANGUES reprendre modèle du mail initial en changent la variable et le nom du fichier */

/* FIN des Paramètres : MAIL & RELANCES ---------- */


/*
 * ----------------------------------------
 * Paramètres : AUTOREPLY
 * ----------------------------------------
 */
	$autoresp = "True"; //Activer l'autoreply : True / False

	$autoresp_subject =  "Suite à votre demande..."; //Objet du mail

	$autoresp_from = $par_annonceur; //expéditeur : nom de la société
	// $autoresp_from = $contacts["contact_1"]["contact_autoreply"]; //expéditeur : nom du premier contact (contact_autoreply)
	// $autoresp_from = "Texte custom";

	$autoresp_reply = $par_dest[1]."@vertical-mail.com";

	$_lt = "hp";//ne pas toucher

	$_width_autoreply 		= "640"; //Largeur du mail
	$_bgcolor_autoreply 	= "#FFFFFF"; //Couleur du fond du mail
	$_clrmention_autoreply	= "#333333"; //Couleur des mentions légales

/* FIN des Paramètres : AUTOREPLY ---------- */

/*
 * ----------------------------------------
 * Paramètres : TRANSFERT (transf.php & transfok.php)
 * ----------------------------------------
 */
	if ($par_domaine == "CLIENT") { //domaine du client
		$action_transfert = ("https://www.vertical-mail.com/scripts/ami_mul_2017.php"); //Appel du fichier de traitement des transferts
	} else { //VM
		$action_transfert = ("../scripts/ami_mul_2017.php"); //Appel du fichier de traitement des transferts
	}

	// Lien de transfert sur le mail initial
	$transfert_lien_mail 	= false; //AFFICHER (true) ou MASQUER (false)

	// Fichier à transférer
	$fichier_transf 		= "mail";//mail initial par défaut ne pas mettre l'extension .php / index

	// ?
	if ($file == "VI") {
		$_hplt2 = ".php?src=VI";
		$_SESSION["s_nom"] = "";
	}
	// ?
	if ($file == "ADD") {
		$_hplt2 = ".php?src=ADD";
		$_SESSION["s_nom"] = "";
	}

	// OBJET DU TRANSFERT
	$transfobjet = ($trad['transfert_reseaux']['transf_objet']);
	// $transfobjet = ($trad['formulaires']['transf_objet']);
	// $transfobjet = "Texte custom";

/* FIN des Paramètres : TRANSFERT (transf.php & transfok.php) ---------- */

/*
 * ----------------------------------------
 * Paramètres : FORMULAIRES / TRAITEMENT / LEAD
 * ----------------------------------------
 */

	/* -------- MAILIT : TRAITEMENT DU FORMULAIRE -------- */
	// Si il y a un traitement spécifique à l'OP modifier le fichier mailit_solo_globale_with_ctl_transfert_2017.php en mailit.php
	// puis modifier le chemin du fichier commun vers le spécifique a l'op
	// Pour les OP avec CTL utilisé le fichier mailit_2017_ctl.php

	/* SI OP MONO-LANGUE */
	if ($par_domaine == "CLIENT") { //domaine du client
		$action = ("https://www.vertical-mail.com/scripts/mailit_solo_globale_with_ctl_transfert_2017.php"); //Appel du fichier commun avec domaine
		// $action = ("mailit_2017_ctl.php"); //Appel du fichier spécifique a l'op si CTL
		// $action = ("mailit.php");//Appel du fichier spécifique a l'op
	} else { //VM
		// $action = ("../scripts/mailit_solo_globale_with_ctl_transfert_2017.php"); //Appel du fichier commun
		// $action = ("mailit_2017_ctl.php"); //Appel du fichier spécifique a l'op si CTL
		$action = ("mailit.php");//Appel du fichier spécifique a l'op
	}

	/* SI OP MULTI-LANGUES + la variable $par_langue = fr_FR; en haut du fichier mailit */
	/*
	if ($par_domaine == "CLIENT") { //domaine du client
		if ($par_langue == 'fr_FR') {
			$action = ("mailit-fr_FR.php");//Appel du fichier spécifique a l'op
		}
		if ($par_langue == 'en_EN') {
			$action = ("mailit-en_EN.php");//Appel du fichier spécifique a l'op
		}
		if ($par_langue == 'es_ES') {
			$action = ("mailit-es_ES.php");//Appel du fichier spécifique a l'op
		}
	} else { //VM
		if ($par_langue == 'fr_FR') {
			$action = ("mailit-fr_FR.php");//Appel du fichier spécifique a l'op
		}
		if ($par_langue == 'en_EN') {
			$action = ("mailit-en_EN.php");//Appel du fichier spécifique a l'op
		}
		if ($par_langue == 'es_ES') {
			$action = ("mailit-es_ES.php");//Appel du fichier spécifique a l'op
		}
	}
	*/


	/* -------- REDIRECTION après validation du formulaire -------- */
	if ($par_domaine == "CLIENT") {
		$par_destination_good = ($par_nom_domaine_client . "/good.php");
		// $par_destination_good_20 = ($par_nom_domaine_client . "/good20.php");//a configurer dans input destination_good de la lp_20
	} else { //VM
		// $par_destination_good = ("https://www.nespresso.com/fr/fr/acquisition-remise-10-euros?v=co&utm_source=Email&utm_medium=EM&utm_campaign=B2C_RETENTION&utm_cd62=B2C&utm_cd63=LOC&utm_cd65=prm04rem10-animexpert&utm_id=520ed7d7-98a4-4e4e-839b-d10c36897ecb");
		$par_destination_good = ("good.php");
	}


	/* -------- LIMITE D'INSCRIPTION (Bloquer le formulaire si quota d'INSCRIPTION "coupon" remplis) - lp + mailit -------- */
	$inscription_limiter 				= false; //true(activer) / false(desactiver)
	$inscription_limiter_nombre 		= "50"; //nombre d'inscription maximum	50
	$inscription_limiter_fichier_fin 	= "fin.php"; //page de fin d'inscription


	/* -------- CHAMPS OBLIGATOIRE DU FORMULAIRE -------- */
	// $mandatory_fields = array('nom_du_champ', "message à afficher")
	// Ici la traduction du message d'erreur est automatique si on doit personnalisé un message
	// ouvrir le fichier de traduction de la langue souhaiter dans le dossier "langues_traductions"
	// par exemple le nom en francais on ouvre le fichier "lang-fr_FR.inc" et on modifie la valeur correspondant a "label_nom"
	// pour le cas de qualifs oblig : si mono-langue ajouter directement dans le $mandatory_fields et si multilangue créer la valeur et sa traduction comme pour l'exemple de la Qualif1
	// pour le cas de multiple formulaire différent suivant LP (formulaire) ne pas oublier d'ajouter la variable $caller = 'page_10'; correspondante dans le head de la LP avant l'appel du parametres.inc
	$mandatory_fields = array(
		'page_10' => array( //
			//'titre'			=> $trad['formulaires']['label_civilite'], //Civilité
			//'nom'			=> $trad['formulaires']['label_nom'], //Nom
			//'prenom'		=> $trad['formulaires']['label_prenom'], //Prénom
			'email'			=> $trad['formulaires']['label_email'], //Email
			// 'tel'			=> $trad['formulaires']['label_teldirect'], //Tél. direct
			// 'mobile'		=> $trad['formulaires']['label_telportable'], //Tél. portable
			// 'fonction'		=> $trad['formulaires']['label_fonctionservice'], //Fonction/Service
			// 'societe'		=> $trad['formulaires']['label_societe'], //Société
			// 'siret'			=> $trad['formulaires']['label_siret'], //Siret
			// 'siren'			=> $trad['formulaires']['label_siren'], //Siren
			// 'naf'			=> $trad['formulaires']['label_naf'], //NAF
			// 'adresse'		=> $trad['formulaires']['label_adresse'], //Adresse
			// 'adresse2'		=> $trad['formulaires']['label_adresse2'], //Adresse
			// 'cp'			=> $trad['formulaires']['label_codepostal'], //Code Postal
			// 'ville'			=> $trad['formulaires']['label_ville'], //Ville
			// 'pays'			=> $trad['formulaires']['label_pays'], //Pays
			// 'secteur'		=> $trad['formulaires']['label_secteur'], //Secteur d'activité
			// 'effectif'		=> $trad['formulaires']['label_effectif'], //Effectif
			// 'echeance1'		=> $trad['formulaires']['label_echeance1'], //Echéance de votre projet

			// 'qualif1'		=> "Texte", //monolangue
			// 'qualif1'		=> "$trad['formulaires']['label_qualif1']", //multilangue (voir detail des configurations dans la partie Paramètres : TRADUCTION MULTI-LANGUES ou MONO-LANGUE)
		)
		/*
		,'page_20' => array(
			'titre'			=> $trad['formulaires']['label_civilite'], //Civilité
			'nom'			=> $trad['formulaires']['label_nom'], //Nom
			'prenom'		=> $trad['formulaires']['label_prenom'], //Prénom
			'email'			=> $trad['formulaires']['label_email'], //Email
			// 'tel'			=> $trad['formulaires']['label_teldirect'], //Tél. direct
			// 'mobile'		=> $trad['formulaires']['label_telportable'], //Tél. portable
			// 'fonction'		=> $trad['formulaires']['label_fonctionservice'], //Fonction/Service
			// 'societe'		=> $trad['formulaires']['label_societe'], //Société
			// 'siret'			=> $trad['formulaires']['label_siret'], //Siret
			// 'siren'			=> $trad['formulaires']['label_siren'], //Siren
			// 'naf'			=> $trad['formulaires']['label_naf'], //NAF
			// 'adresse'		=> $trad['formulaires']['label_adresse'], //Adresse
			// 'adresse2'		=> $trad['formulaires']['label_adresse2'], //Adresse
			// 'cp'			=> $trad['formulaires']['label_codepostal'], //Code Postal
			// 'ville'			=> $trad['formulaires']['label_ville'], //Ville
			// 'pays'			=> $trad['formulaires']['label_pays'], //Pays
			// 'secteur'		=> $trad['formulaires']['label_secteur'], //Secteur d'activité
			// 'effectif'		=> $trad['formulaires']['label_effectif'], //Effectif
			// 'echeance1'		=> $trad['formulaires']['label_echeance1'], //Echéance de votre projet

			// 'qualif1'		=> "Texte", //monolangue
			// 'qualif1'		=> "$trad['formulaires']['label_qualif1']", //multilangue (voir detail des configurations dans la partie Paramètres : TRADUCTION MULTI-LANGUES ou MONO-LANGUE)
		)
		*/
	);


	/* -------- CHAMPS CONDITIONEL -------- */

	// CONDITION OBLI TEL OU MOBILE (solos_form.inc + js charger sur lp + mailit)
	// $cond_oblig_tel_ou_mobile = true; //true ou false

	// CHAMPS CONDITIONNELS Case à cocher SMS true alors N° PORTABLE (MOBILE) oblig
	// Fichiers impacté : solos_forms.inc + LP (10.php) > js/cond_sms_oblig_mobile.js + Mailit
	// Par défaut la qualif de la case a cocher SMS est qualif29
	// /!\ pas de traduction du placeholder (js)
	$cond_sms_oblig_mobile = false; //true ou false

	// CHAMPS CONDITIONNELS PHONES MOBILE OU TEL oblig
	// Fichiers impacté : solos_forms.inc + LP (10.php) > js/cond_phone_oblig.js + Mailit
	$cond_phone_oblig = false; //true ou false

	/* -------- CHAMPS CACHER -------- */
	// Rempli dans le coupon mais non présent dans le formulaire
	// $hidden_fields = array('siret', 'siren', 'naf');
	//$hidden_fields = array('adresse','adresse2','cp','ville','siret','fonction','secteur','effectif','naf');


	/* -------- GROUPER LES CHAMPS -------- */
	// Utilisable dans le cas par ex  : LP de Parrainage de filleul (nom, prénom, mail) qui vont recevoir un mail auto suite au coupon du parain.
	$transfert_module = false;  //Transfert activé (true)/désactivé (false) dans le mailit
	$transfert_cope_ope = "";   //Code ope à transféré (si vide ce sera le code ope de l'opération en cours par défaut)

	// Objet du mail de transfert
	$subject_transfert = "Mon sujet de transfert";
	/* SI OP MULTI-LANGUES */
	/*
	if ($par_langue == 'fr_FR') {
		$subject_transfert = "Mon sujet de transfert en français";
	}
	if ($par_langue == 'en_EN') {
		$subject_transfert = "Mon sujet de transfert en anglais";
	}
	if ($par_langue == 'es_ES') {
		$subject_transfert = "Mon sujet de transfert en espagnol";
	}
	*/

	// Grouper les champs liés à un même transfert
	$transfert_blocs = array(
		/*
		"bloc1" => array(
			'qualif2' 		=> "prenom",
			'qualif3' 		=> "nom",
			'qualif4' 		=> "email",
			'group_name'	=> "Groupe 1"
		)
		*/
	);


	/* -------- LEADS / COUPON -------- */
	/* Personnalisé l'Objet du lead */

	// le préfix de l'objet
	if ($par_langue_coupons == 'fr_FR') {
		$par_prefixe_objet_leads = 'VM : Demande info';
	}
	if ($par_langue_coupons == 'en_EN') {
		$par_prefixe_objet_leads = 'VM: Information request';
	}
	// Si code op client
	if ($par_operation_client != "") {
		$par_detail_client = " - " . $par_operation_client;
	}
	// Objet du mail du lead
	$par_formname = ($par_prefixe_objet_leads . " " . $par_annonceur . $par_detail_client);

	// Logo du lead (coupons mail)
	$lead_logo_src = 'https://www.vertical-mail.com/include/standard_solo_global/visuals/lead/logo_vertical_mail.jpg'; //taille width="200" height="72"
	// $lead_logo_src = 'https://www.vertical-mail.com/' . $operation . '/visuals/lead/logo_vertical_mail.jpg'; //taille width="200" height="72"

	$lead_logo_alt = "Vertical-Mail";//alt du logo

	// Personnalisation des noms de qualifs - ex : Question d'un Quiz
	$qualif_name1	= "Qualif1&nbsp;: "; //Qualif1
	$qualif_name2	= "Qualif2&nbsp;: "; //Qualif2
	$qualif_name3	= "Qualif3&nbsp;: "; //Qualif3
	$qualif_name4	= "Qualif4&nbsp;: "; //Qualif4
	$qualif_name5	= "Qualif5&nbsp;: "; //Qualif5
	$qualif_name6	= "Qualif6&nbsp;: "; //Qualif6
	$qualif_name7	= "Qualif7&nbsp;: "; //Qualif7
	$qualif_name8	= "Qualif8&nbsp;: "; //Qualif8
	$qualif_name9	= "Qualif9&nbsp;: "; //Qualif9
	$qualif_name10	= "Qualif10&nbsp;: "; //Qualif10
	$qualif_name11	= "Qualif11&nbsp;: "; //Qualif11
	$qualif_name12	= "Qualif12&nbsp;: "; //Qualif12
	$qualif_name13	= "Qualif13&nbsp;: "; //Qualif13
	$qualif_name14	= "Qualif14&nbsp;: "; //Qualif14
	$qualif_name15	= "Qualif15&nbsp;: "; //Qualif15
	$qualif_name16	= "Qualif16&nbsp;: "; //Qualif16
	$qualif_name17	= "Qualif17&nbsp;: "; //Qualif17
	$qualif_name18	= "Qualif18&nbsp;: "; //Qualif18
	$qualif_name19	= "Qualif19&nbsp;: "; //Qualif19
	$qualif_name20	= "Qualif20&nbsp;: "; //Qualif20
	$qualif_name21	= "Qualif21&nbsp;: "; //Qualif21
	$qualif_name22	= "Qualif22&nbsp;: "; //Qualif22
	$qualif_name23	= "Qualif23&nbsp;: "; //Qualif23
	$qualif_name24	= "Source fichier&nbsp;: ";	//Qualif24
	$qualif_name25	= "Qualif25&nbsp;: "; //Qualif25
	$qualif_name26	= "Qualif26&nbsp;: "; //Qualif26
	$qualif_name27	= "Qualif27&nbsp;: "; //Qualif27
	$qualif_name28	= "Qualif28&nbsp;: "; //Qualif28
	$qualif_name29	= "Qualif29&nbsp;: "; //Qualif29		Utiliser pour la case a cocher SMS obli mobile par défaut
	$qualif_name30	= "Qualif30&nbsp;: "; //Qualif30


	// Règle de distribution des coupons personnalisée (false | true)
	$distrib_rule = false;

	// Définition des règles
	function distrib_rule($fields=array(),$mail_france){
		extract($fields);
		if ($effectif == "- de 10 salaries" or $effectif == "10 a 49 salaries") {
			$mail_france="False";
		}
		return $mail_france;
	}

	// Paramètres pour une redirection
	function paramsRedirect($fields=array()) {
		session_start();
		foreach($fields as $field=>$value){
			$_SESSION["s_".$field] = html_entity_decode($value);
		}
		session_write_close();
	}

/* FIN des Paramètres : FORMULAIRES ---------- */


/*
 * ----------------------------------------
 * Configuration : TEMPLATE
 * ----------------------------------------
 */

	/* -------- FAVICON -------- */
	// <link rel="shortcut icon" href="https://www.vertical-mail.com/include/standard_solo_global/visuals/favicon-vm.png" type="image/x-icon" />
	$lien_favicon = 'https://www.vertical-mail.com/include/standard_solo_global/visuals/favicon-vm.png'; //mail, lp, good, transf et transfok
	// $lien_favicon = 'https://www.vertical-mail.com/'.$par_operation.'/favicon.ico'; //mail, lp, good, transf et transfok

/* -------- STYLE 10.php & transf.php -------- */

	/* -------- RESPONSIVE -------- */
	$par_responsive = true; //ACTIVER (true) ou DESACTIVER (false) : les scripts pour le RWD


	/* -------- Placeholder IE 9 et inférieur -------- */
	$src_style_form = 'commun'; //Générique (commun) ou Spécifique à l'OP (local)

		// Générique
		if ($src_style_form == 'commun') {
			$style_form = "../include/standard_solo_global/polyfill/css/placeholder.polyfill.css";
		}
		// Spécifique a l'op
		if ($src_style_form == 'local') {
			$style_form = "inc/polyfill/css/placeholder.polyfill.css";
		}


	/* -------- FANCYBOX -------- */
	$add_fancybox = true; //AJOUTER (true) ou NON (false) : les scripts pour les popups
	$src_fancybox = 'commun'; //Générique (commun) ou Spécifique à l'OP (local)

		// Générique
		if ($src_fancybox == 'commun') {
			$fancybox_url_header = "../include/standard_solo_global/fancybox/fancybox_header.inc";
			$fancybox_url_footer = "../include/standard_solo_global/fancybox/fancybox_footer.inc";
		}
		// Spécifique a l'op
		if ($src_fancybox == 'local') {
			$fancybox_url_header = "inc/fancybox/fancybox_header.inc";
			$fancybox_url_footer = "inc/fancybox/fancybox_footer.inc";
		}


	/* -------- SLIDER -------- */
	$add_slider = true; //AJOUTER (true) ou NON (false): les scripts pour les sliders
	$src_slider = 'commun'; //Générique (commun) ou Spécifique à l'OP (local)

		// Générique
		if ($src_slider == 'commun') {
			$slider_url_header = "../include/standard_solo_global/slider/slider_header.inc";
			$slider_url_footer = "../include/standard_solo_global/slider/slider_footer.inc";
			$slider_url_css = "../include/standard_solo_global/slider/slider_personal_styles.inc";
			//include $par_nom_domaine_vm . '/include/standard_solo_global/slider/slider_personal_styles.inc';
		}
		// Spécifique a l'op
		if ($src_slider == 'local') {
			$slider_url_header = "inc/slider/slider_header.inc";
			$slider_url_footer = "inc/slider/slider_footer.inc";
			$slider_url_css = "inc/slider/slider_personal_styles.inc";
		}

	/*
	 * POUR AFFICHER LE SLIDER :
		<?php //Ajouter un slider
		if ($add_slider == true) {
			add_slider($slider_params[0]);//PARAMETRE $slider_params le premier slider est 0 puis 1, 2, 3...
		} ?>
	*/

	// Sliders responsive ?
	if ($par_responsive  == true) {
		// OP RESPONSIVE
		$slider_responsive = true;
	} else {
		// OP NON RESPONSIVE
		$slider_responsive = false;
	}

	//Paramètre des sliders
	$slider_params = array(
		array(	//slider 0
			'slider_identifiant'		=> 'products', //Custom slider_footer.inc - le nom doit etre unique
			'resp'						=> $slider_responsive, //Activer le slider responsive si l'op est responsive
			// 'resp'							=> false, //si on souhaite ne pas activer le slider responsive sur une OP responsive
			'slider_width'				=> 461, //Largeur du slider en desktop
			'slider_width_740'			=> 300, //Largeur du slider en tablette 740
			'slider_width_320'			=> 200, //Largeur du slider en mobile 320
			'slider_height'				=> 372, //Hauteur du slider en desktop pour la tablette 740 & mobile 320 le calcul est auto
			'slider_mode'				=> 'slide', //Effet 'slide' | 'fade'
			'slide_id'					=> 0, //Premier slide dans l'ordre du tableau "slider_photos" : 0 = 1 pour le premier, 2 pour de deuxième...
			'slider_nb'					=> 3, //Nombre total de slides dans le tableau "slider_photos"
			'slider_speed'				=> 350, //Temps d'animation en ms
			'slider_pause'				=> 4000, //Temps d'affichage d'une slide en ms
			'slider_pause_hover'		=> true, //Activer l'arrêt du slide au hover (true) / false
			'slider_navigation'			=> true, //Ajouter les flèches de navigation (true) / false
			// 'slider_nav_left_img'		=> 'sliders/left_triangle.png', //Flèche de navigation gauche (cible le dossier visuals/sliders/left.png left_arrow_light.png, left_triangle.png)
			'slider_nav_left_img'		=> 'left.png', //Si 'left.png' - Flèche de navigation gauche par défaut (https://vertical-mail.com/include/standard_solo_global/slider/img/left.png)
			// 'slider_nav_right_img'		=> 'sliders/right_triangle.png', //Flèche de navigation droite (cible le dossier visuals/sliders/right.png)
			'slider_nav_right_img'		=> 'right.png', //Si 'right.png' - Flèche de navigation droite par défaut (https://vertical-mail.com/include/standard_solo_global/slider/img/right.png)
			'slider_hauteur_nav'		=> '50%', // Hauteur des btn de navigation en px ou % en desktop - defaut 50%
			'slider_hauteur_nav_740'	=> '50%', // Hauteur des btn de navigation en px ou % en tablette 740 - defaut 50%
			'slider_hauteur_nav_320'	=> '50%', // Hauteur des btn de navigation en px ou % en mobile 320 - defaut 50%
			'slider_pagination'			=> true, //Ajouter la pagination (true) / false
			'slider_photos'				=> array( //Liste des images du slider
											'sliders/slide1.jpg',
											'sliders/slide2.jpg',
											'sliders/slide3.jpg'
										)
		),
		/*
		array(	//slider 1
			'slider_identifiant'		=> 'diapo', //Custom slider_footer.inc - le nom doit etre unique
			'resp'						=> $slider_responsive, //Activer le slider responsive si l'op est responsive
			// 'resp'						=> false, //si on souhaite ne pas activer le slider responsive sur une OP responsive
			'slider_width'				=> 300, //Largeur du slider en desktop
			'slider_width_740'			=> 200, //Largeur du slider en tablette 740
			'slider_width_320'			=> 100, //Largeur du slider en mobile 320
			'slider_height'				=> 200, //Hauteur du slider en desktop pour la tablette 740 & mobile 320 le calcul est auto
			'slider_mode'				=> 'fade', //Effet 'slide' | 'fade'
			'slide_id'					=> 0, //Premier slide dans l'ordre du tableau "slider_photos" : 0 = 1 pour le premier, 2 pour de deuxième...
			'slider_nb'					=> 3, //Nombre total de slides dans le tableau "slider_photos"
			'slider_speed'				=> 350, //Temps d'animation en ms
			'slider_pause'				=> 4000, //Temps d'affichage d'une slide en ms
			'slider_pause_hover'		=> true, //Activer l'arrêt du slide au hover (true) / false
			'slider_navigation'			=> true, //Ajouter les flèches de navigation (true) / false
			// 'slider_nav_left_img'		=> 'sliders/left_triangle.png', //Flèche de navigation gauche (cible le dossier visuals/sliders/left.png left_arrow_light.png, left_triangle.png)
			'slider_nav_left_img'		=> 'left.png', //Si 'left.png' - Flèche de navigation gauche par défaut (https://vertical-mail.com/include/standard_solo_global/slider/img/left.png)
			// 'slider_nav_right_img'		=> 'sliders/right_triangle.png', //Flèche de navigation droite (cible le dossier visuals/sliders/right.png)
			'slider_nav_right_img'		=> 'right.png', //Si 'right.png' - Flèche de navigation droite par défaut (https://vertical-mail.com/include/standard_solo_global/slider/img/right.png)
			'slider_hauteur_nav'		=> '50%', // Hauteur des btn de navigation en px ou % en desktop - defaut 50%
			'slider_hauteur_nav_740'	=> '50%', // Hauteur des btn de navigation en px ou % en tablette 740 - defaut 50%
			'slider_hauteur_nav_320'	=> '50%', // Hauteur des btn de navigation en px ou % en mobile 320 - defaut 50%
			'slider_pagination'			=> true, //Ajouter la pagination (true) / false
			'slider_photos'				=> array( //Liste des images du slider
											'sliders/slide1.jpg',
											'sliders/slide2.jpg',
											'sliders/slide3.jpg'
										)
		),
		*/
	);

/* FIN des Paramètres : TEMPLATE ---------- */

// __________________ FIN PARAMETRES SPECIFIQUES A L'OP __________________ //

// -------------------------------------------------------------------- //
// -------------------- NE PAS MODIFIER EN-DESSOUS -------------------- //
// -------------------------------------------------------------------- //

// ------------------- FORMULAIRE ------------------- //
$url = $_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"];

// ------------------------------------------------------------ //

if ($mailer == "DOLIST" or $mailer == "KERNIX") {
	$_lt = "ml";
}

// gestion des liens et appel de données
$_hplt1 	= "https://www.vertical-mail.com/{$par_operation}/";
$_hplt2 	= ".php";
$_hplt2b 	= ".php?open=web";
$_hplt2c 	= "?src={$_SESSION["s_source"]}&email={$_SESSION["s_email"]}&sending_id={$_SESSION["s_sending_id"]}";
$_mllt1 	= "\"https://www.vertical-mail.com/{$par_operation}/";

include ("../include/liens_variables.inc");
// fin

if (isset($version) and $version != "PERSO") {
	$_SESSION["s_societe"] = "";
	$_SESSION["s_titre"] = "";
	$_SESSION["s_nom"] = "";
}

// ----------------- Ne pas toucher ------------------------- //
define("MAILER", $mailer);
define("HPLT1", $_hplt1);
define("HPLT2C", $_hplt2c);
define("MLLT1", $_mllt1);
define("MLLT2", preg_replace("/(.php4|.php)/i", "", $_mllt2));
