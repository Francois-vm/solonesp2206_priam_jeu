<?php
/*
 * TemplateName: standard_solo_GLOBAL
 *
 * Lien en Clic to Lead (validation auto du formulaire de la LP : si toutes les donn�es oblig '$fields_ctl' sont compl�tes ont passe directement a la GOOD autrement on revient sur la LP)
 * /!\ ce type de lien doit comprendre une mention sp�cifique et/ou un rappel de leurs coordonn�es avec possibilit� de modification (vers la LP) dans le mail
 * ex mention : * En cliquant sur ce lien, vous acceptez que vos coordonn�es soient transmises � NOM DU CLIENT.
 	En application de la loi Informatique et Libert� du 6 janvier 1978, vous pouvez acc�der aux informations vous concernant, demander leur rectification ou exiger de ne plus figurer dans notre base de donn�es en nous envoyant un message via e-mail. Si vous ne souhaitez pas recevoir d'informations commerciales susceptibles de vous int�resser, veuillez nous le pr�ciser par e-mail. Si vous changez d'avis, il vous suffit de nous en faire part, �galement, par simple e-mail.
 *
 * @version: 1.1 - 03/2017
 */

/*FIX2009-11-26*/ include_once('/home/verticalmail/includes.php');

include("../include/db.inc");

include_once("parametres.inc");
include("../include/php_headers.inc");

// Param�tres du click to lead
	$caller = 'page_10';//champ oblig $mandatory_fields : page_10, page_20...

	//Redirection en cas d'erreur
	//$par_destination_bad = "https://www.vertical-mail.com/" . $par_operation . "/10.php";
	if ( $par_domaine == "VM" ) {

		if ($par_src_index == 'lp') {
			//pointe sur l'index index
			$par_destination_bad = $par_nom_domaine_vm . '/' . $par_operation;

		} else {
			//pointe sur le fichier lp
			$par_destination_bad = $par_nom_domaine_vm . '/' . $par_operation . '/' . $par_fichier_page_lp;
		}

	} elseif ( $par_domaine == "CLIENT" ) {

		if ($par_src_index == 'lp') {
			//pointe sur l'index index
			$par_destination_bad = $par_nom_domaine_client;
		} else {
			//pointe sur le fichier lp
			$par_destination_bad = $par_nom_domaine_client . '/' . $par_fichier_page_lp;
		}

	}

	// Champs � fournir
	$fields_ctl = array(
		"email"		=> $_SESSION["s_email"],		
		"qualif28"	=> $_SESSION['s_sub_id'],
		"prenom"	=> utf8_decode(html_entity_decode(urldecode($_SESSION["s_prenom"]))),
		"nom"		=> utf8_decode(html_entity_decode(urldecode($_SESSION["s_nom"]))),
		"qualif1"	=> 0,
		"caller"	=> $caller,
		// liste des mentions obligatoires
	);
	/*var_dump($fields_ctl);
	exit;*/

include("../scripts/curl_click_to_lead.inc");
//include_once("curl_click_to_lead.inc");

// Fin param�tres
