<?php
/*
 * TemplateName: standard_solo_GLOBAL
 *
 * @version: 1.2 - 08/2018
 */

/*FIX2009-11-26*/ include_once('/home/verticalmail/includes.php');

$par_langue = 'fr_FR';//langue de la page fr_FR, en_EN, es_ES

if($_SERVER['REQUEST_URI']=='/scripts/mailit_solo_globale_with_ctl_transfert_2017.php') {
	include_once("../".$_POST["operation"]."/parametres.inc");
} else {
	include_once("parametres.inc");
}
include("../include/php_headers.inc");//Variables de sessions

//Enregistrement dans la base de données
//Ouverture de la base de données
include("../include/db.inc");

// Bloquer le formulaire si quota d'INSCRIPTION (coupon) remplis
if ( $inscription_limiter == true ) {
	$sql = "select count(*) as nbcoupon from t_coupon where id_operation='" . $operation . "' AND envoyer = 'true' group by id_operation";
	$req = mysql_query($sql) or die (mysql_error());
	$data = mysql_fetch_array($req);

	if($data['nbcoupon']>=$inscription_limiter_nombre){
		header( "Location:".$inscription_limiter_fichier_fin );
		exit();
	}
}

$is_ctl = false;
if($json == "ctl") {
	$is_ctl = true;
}

//fonction pour squizzer les majuscules
function vm2($texte) {
	$accent='ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËéèêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ';
	$noaccent='AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn';
	$texte = strtr($texte,$accent,$noaccent);
	return $texte;
}

while(list($indice,$valeur) = each($_GET)) {
	${$indice} = trim($valeur);
}

while(list($indice,$valeur) = each($_POST)) {
	${$indice} = trim($valeur);
}

//Récupération de l'IP et des infos sur le navigateur
$ip = $_SERVER["REMOTE_ADDR"];
$browser = $_SERVER["HTTP_USER_AGENT"];

if(!isset($url)) {
	$page_url = $_SERVER["HTTP_REFERER"];
} else {
	$page_url=$url;
}

if (strpos($page_url,"?") > 0 ) {
	$page_url = substr($page_url, 0, strpos($page_url,"?"));
}

// TEST VARIABLES

//CLIC TO LEAD
$mail_valid = "True";
$mail_france = "False";//Clic to Lead : True/False distrib ou pas
$qualif30 = "valid"; //ajouter ctl
$erreur = false;
$sendToCustomer = strpos($email, 'vertical-mail.com') === false; //ajouter ctl
//fin CLIC TO LEAD

//if ($operation=="solohec1001sem") $mail_france = "False";

//Message d'erreur si champs obligatoires non renseignés ou si email mal formaté
$_SESSION["erreur_saisie"] = "";
$erreur_saisie_message = "";

$email=str_replace("}","",str_replace("{","",str_replace("{email}","",trim($email))));
if(substr(trim($email),-2)=="7D"){
    $email = substr(trim($email),0,-2);
}

$email_valid = ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'. '@'. '[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.'. '[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$', $email) ;

foreach($mandatory_fields[$caller] as $k=>$v){ //$caller pour suivant oblig différente de la lp
    if($k=="email"){
        if (!$email_valid){
            $mail_valid = "False";
			$erreur_saisie_message .= "<li>".$v."</li>";
        }
    }
    elseif($$k ==""){
        $mail_valid = "False";
		$erreur_saisie_message .= "<li>".$v."</li>";
    }
}

/*
//CAS CONDITIONNEL ex : si qualif11 non vide alors adresse, code postal et ville sont oblig
if ($qualif11 !=""){
	if($adresse ==""){
        $mail_valid="False";
        $erreur_saisie_message .= "<li>Adresse</li>";
    }
	if($cp ==""){
        $mail_valid="False";
        $erreur_saisie_message .= "<li>Code postal</li>";
    }
	if($ville ==""){
        $mail_valid="False";
        $erreur_saisie_message .= "<li>Ville</li>";
    }
}
*/
/* CHAMPS CONDITIONNELS Case à cocher SMS true alors MOBILE oblig */
if ($cond_sms_oblig_mobile === true) {
	//CAS CONDITIONNEL ex : si qualif29 non vide alors mobile sont oblig
	if($mandatoryOblig_conditionel == "1" && $mobile == "" && $qualif29 != "") {
		$mail_valid="False";
		//$erreur_saisie .= "<li>T&eacute;l. portable</li>";
		$erreur_saisie .= "<li>" . $trad['formulaires']['label_telportable'] . "</li>";
	}
	if ($qualif29 !="") {
		if($mobile =="") {
			$mail_valid="False";
			//$erreur_saisie_message .= "<li>T&eacute;l. portable</li>";
			$erreur_saisie_message .= "<li>" . $trad['formulaires']['label_telportable'] . "</li>";
		}
	}
}

/* CHAMPS CONDITIONNELS Mobile ou Tel oblig */
if($cond_phone_oblig===true){
	if($mobile =="" && $tel==""){
		$mail_valid="False";
		$erreur_saisie_message .= "<li>T&eacute;l&eacute;phone (fixe ou portable)</li>";
	}
}


foreach($transfert_blocs as $group=>$fields) {
    $group_name = $fields["group_name"];
    unset($fields["group_name"]);
    $empty_fields = 0;
    $group_email_valid = true;
    foreach($fields as $field => $type) {
        if($$field=="") {
            $empty_fields++;
        } elseif($type == "email" && !ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'. '@'. '[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.'. '[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$', $$field)) {
            $group_email_valid = false;
        }
    }
    if($empty_fields!=0 && $empty_fields!=count($fields)) {
        $erreur_saisie_message .= "<li>".$group_name."</li>";
        $_SESSION["erreur_".$group] = "True";
    }
    if(!$group_email_valid) {
        $erreur_saisie_message .= "<li>L'email du groupe : ".$group_name."</li>";
        $_SESSION["erreur_".$group] = "True";
    }
}

if($erreur_saisie_message!="") {
	$_SESSION["erreur_saisie"]  = "<p align=\"left\" class=\"titre_erreur\">". $trad['formulaires']['popup_erreur_top'] ."</p>";
	$_SESSION["erreur_saisie"] .= "<ul class=\"liste_erreur\">";
	$_SESSION["erreur_saisie"] .= $erreur_saisie_message;
	$_SESSION["erreur_saisie"] .= "</ul>";
	$_SESSION["erreur_saisie"] .= "<p class=\"message_erreur\">". $trad['formulaires']['popup_erreur_bottom'] ."</p>";
}


//Filtre faux leads robots
$sqlIp = "SELECT *
FROM tempOperation.IP_rejet
WHERE concat(part1,'.',part2,'.',part3,'.',part4)='$ip'
or (part4='' and concat(part1,'.',part2,'.',part3)=substring_index('$ip','.',3))
or (part3='' and part4='' and concat(part1,'.',part2)=substring_index('$ip','.',2))
or (part2='' and part3='' and part4='' and concat(part1)=substring_index('$ip','.',1))
limit 1";
$reqIp = mysql_query($sqlIp) or die (mysql_error());
if(mysql_num_rows($reqIp)>0){
	$mail_france = "False";
	$qualif30 = "Robot OFFICE365";
}


if($distrib_rule==true) {
	$mail_france = distrib_rule($_POST, $mail_france);
}

if ($qualif24 == "") {
	$qualif24 = "VM";
}
if ($source == "VI" or $source == "EXT") {
	$qualif24 = $source;
}

//Encodage prénom - Nom
/*$prenom = utf8_decode(rawurldecode($prenom));
$nom = utf8_decode(rawurldecode($nom));*/

//CTL
if ($mail_valid == "False" ) {
	$qualif30 = "";
}

//Génération du code promo
//$qualif5 = "PROMOTEST3456";

//Récupération des codes pour les campagnes d'animation
if($qualif1 == 1) {

	//3 codes promos à récupérer pour les relances automatiques

	// Récupération du code AOL dans qualif3 - ENVOI A PRIAM
	$sqlcodeaol1 = "select  * from tempOperation.nespresso_codes_AOL where email='" . quote_smart($email) . "' and email<>''";
	$reqcodeaol1 = mysql_query($sqlcodeaol1) or die (mysql_error());
	if(mysql_num_rows($reqcodeaol1)!=0) {
				  $tcodeaol = mysql_fetch_array($reqcodeaol1);
				  $qualif3 = $tcodeaol["code"];
	}
	else {
				  $sqlcodeaol2 = "
							   update tempOperation.nespresso_codes_AOL
							   set
							   0_dispo_1_sinon=1,
							   email='" . quote_smart($email) . "'
   where 0_dispo_1_sinon=0
   and email <> '" . quote_smart($email) . "'
							   limit 1
							   ";
				  $reqcodeaol2 = mysql_query($sqlcodeaol2) or die (mysql_error());
				  $sqlcodeaol3 = "select  * from tempOperation.nespresso_codes_AOL where email='" . quote_smart($email) . "' and email<>''";
				  $reqcodeaol3 = mysql_query($sqlcodeaol3) or die (mysql_error());
				 if(mysql_num_rows($reqcodeaol3)==1) {
							   $tcodeaol = mysql_fetch_array($reqcodeaol3);
							   $qualif3 = $tcodeaol["code"];
				  }
				  else {
							   $mail_france = "False";
							   $qualif30 = "Plus de code AOL";
				  }
	}

	// Récupération du code AIN dans qualif4 - ENVOI A PRIAM
	$sqlcodeain1 = "select  * from tempOperation.nespresso_codes_AIN where email='" . quote_smart($email) . "' and email<>''";
	$reqcodeain1 = mysql_query($sqlcodeain1) or die (mysql_error());
	if(mysql_num_rows($reqcodeain1)!=0) {
				  $tcodeain = mysql_fetch_array($reqcodeain1);
				  $qualif4 = $tcodeain["code"];
	}
	else {
				  $sqlcodeain2 = "update tempOperation.nespresso_codes_AIN
							   set
							   0_dispo_1_sinon=1,
							   email='" . quote_smart($email) . "'
   where 0_dispo_1_sinon=0
   and email <> '" . quote_smart($email) . "'
							   limit 1
							   ";
				  $reqcodeain2 = mysql_query($sqlcodeain2) or die (mysql_error());
				  $sqlcodeain3 = "select  * from tempOperation.nespresso_codes_AIN where email='" . quote_smart($email) . "' and email<>''";
				  $reqcodeain3 = mysql_query($sqlcodeain3) or die (mysql_error());
				 if(mysql_num_rows($reqcodeain3)==1) {
							   $tcodeain = mysql_fetch_array($reqcodeain3);
							   $qualif4 = $tcodeain["code"];
				  }
				  else {
							   $mail_france = "False";
							   $qualif30 = "Plus de code AIN";
				  }
	}

	// Récupération du code ARE dans qualif6 - ENVOI A PRIAM
	$sqlcodeare1 = "select  * from tempOperation.nespresso_codes_ARE where email='" . quote_smart($email) . "' and email<>''";
	$reqcodeare1 = mysql_query($sqlcodeare1) or die (mysql_error());
	if(mysql_num_rows($reqcodeare1)!=0) {
				$tcodeare = mysql_fetch_array($reqcodeare1);
				$qualif6 = $tcodeare["code"];
	}
	else {
				$sqlcodeare2 = "update tempOperation.nespresso_codes_ARE
							set
							0_dispo_1_sinon=1,
							email='" . quote_smart($email) . "'
	where 0_dispo_1_sinon=0
	and email <> '" . quote_smart($email) . "'
							limit 1
							";
				$reqcodeare2 = mysql_query($sqlcodeare2) or die (mysql_error());
				$sqlcodeare3 = "select  * from tempOperation.nespresso_codes_ARE where email='" . quote_smart($email) . "' and email<>''";
				$reqcodeare3 = mysql_query($sqlcodeare3) or die (mysql_error());
				if(mysql_num_rows($reqcodeare3)==1) {
							$tcodeare = mysql_fetch_array($reqcodeare3);
							$qualif6 = $tcodeare["code"];
				}
				else {
							$mail_france = "False";
							$qualif30 = "Plus de code ARE";
				}
	}

}


// Récupération du code PIN dans qualif5 - TABLE UNIQUE - NON ENVOYE A PRIAM MAIS AFFICHE AU REPONDANT
/*$sqlcodepin1 = "select  * from tempOperation.nespresso_codes_PIN_Inissia where email='" . quote_smart($email) . "' and email<>''";
$reqcodepin1 = mysql_query($sqlcodepin1) or die (mysql_error());
if(mysql_num_rows($reqcodepin1)!=0) {
	$tcodepin = mysql_fetch_array($reqcodepin1);
	$qualif5 = $tcodepin["code"];
}
else {
	$sqlcodepin2 = "
				  update tempOperation.nespresso_codes_PIN_Inissia
				  set
				  0_dispo_1_sinon=1,
				  email='" . quote_smart($email) . "'
where 0_dispo_1_sinon=0
and email <> '" . quote_smart($email) . "'
				  limit 1
				  ";
	$reqcodepin2 = mysql_query($sqlcodepin2) or die (mysql_error());
	$sqlcodepin3 = "select  * from tempOperation.nespresso_codes_PIN_Inissia where email='" . quote_smart($email) . "' and email<>''";
	$reqcodepin3 = mysql_query($sqlcodepin3) or die (mysql_error());
	if(mysql_num_rows($reqcodepin3)==1) {
				  $tcodepin = mysql_fetch_array($reqcodepin3);
				  $qualif5 = $tcodepin["code"];
	}
	else {
				  $mail_france = "False";
				  $qualif30 = "Plus de code PIN";
	}
}*/




$configTel = array(" ",".","/",",");
$tel = str_replace($configTel,"",$tel);
$mobile = str_replace($configTel,"",$mobile);

if ($source == "OFFICIEL") {
	if (substr($tel,0,1) != "0") {
		$tel = "0" . $tel;
	}
	if (substr($mobile,0,1) != "0") {
		$mobile = "0" . $mobile;
	}
}

// MD5 de l'email en qualif29 pour id_unique
$qualif29 = md5($email);

// Repousser les clients nespresso
if(isset($email) && !empty($email)) {
	$sqlAlreadyNespressoCustomer = "SELECT COUNT(*) as nb FROM tempOperation.nespresso_blacklist_email WHERE email = '" . quote_smart($email) . "'";
	$reqAlreadyNespressoCustomer = mysql_query($sqlAlreadyNespressoCustomer) or die (mysql_error());
	$countAlreadyNespressoCustomer = mysql_fetch_array($reqAlreadyNespressoCustomer);

	if($countAlreadyNespressoCustomer['nb'] > 0) {
		$mail_france = "false";
		$qualif30 = "LEAD DEJA CLIENT NESPRESSO";
	}
}

// REPOUSSER DES IP DOUTEUX, MISE EN NON DISTRIB ET 'IP REPOUSSEE' EN QUALIF30
$sqlIp = "select ip from tempOperation._ip_rejet_lead where ip='$ip'";
$reqIp = mysql_query($sqlIp) or die (mysql_error());
if(mysql_num_rows($reqIp)>0){
	$mail_france = "False";
	$qualif30 = "IP REPOUSSEE";
}

/*$s = "select * from tempOperation.nespresso_repoussoir where email='" . md5($email) . "'";
$r = mysql_query($s);
if (mysql_num_rows($r)!=0){
	$mail_france = "false";
	$qualif30 = "email repoussoir";
}*/

$s = "select * from CHARTERDB.t_coupon where id_operation like '" . $operation . "' and email='" . $email . "' and email<>'' and envoyer='True'";
$r = mysql_query($s);
if (mysql_num_rows($r)!=0){
	$mail_france = "false";
	$qualif30 = "doublon";
}

// COLLECTE EMAILS D'ANNONCEURS

$annonceur_emails = array();
$annonceur_echeances = array();

for ($i=1; $i<20; $i++) {
	if ( ${'dest'.$i} != "" ) {
		$annonceur_code[] = ${'dest'.$i} ;
		$annonceur_emails[] = ${'dest'.$i} . "@vertical-mail.com";
		$annonceur_echeances[] = ${'echeance'.$i};
	}
}

// MAIL AUX ANNONCEURS

if (($mail_france == "True") and ($mail_valid=="True")) {
	//$logfile = "../private/_logs/couponlog.txt";
	//$logfile = "../_logs/" . $operation . "_couponlog.txt";
} else {
	//$logfile = "../private/_logs/notsent_couponlog.txt";
	//$logfile = "../_logs/notsent_couponlog.txt";
}

$fp = fopen($logfile,"a");

// FOR EVERY ANNONCEUR

$max = sizeof($annonceur_emails);

for ($i=0; $i<$max; $i++) {

	/* CONTENU LEAD */
	$mailmessage 	 	 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
	$mailmessage 	 	.= '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">';
	//HEAD
	$mailmessage 	 	.= '<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<style>
			.ExternalClass { width:100%; }
			body { -webkit-text-size-adjust:none; -ms-text-size-adjust:none; }
			table td { border-collaspse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; margin:0; padding:0; }
			img { margin:0; padding:0; }
			@media only screen and (max-width: 3000px), (max-device-width: 3000px) {
				*[class~=general] { width:640px!important; }
			}
			@media only screen and (max-width: 639px), (max-device-width: 639px) {
				*[class~=general] { width:320px!important; }
				*[class~=resize320] { width:320px!important; height:auto!important; }
				*[class~=w320] { width:320px!important; }
				*[class~=h40] { height:40px!important; }
				*[class~=h50] { height:50px!important; }
				/* Supprimer le padding (ne fonctionne pas sous app gmail android) */
				*[class~=p0] { padding:0!important; }
				/* Supprimer le margin */
				*[class~=m0] { margin:0!important; }
				*[class~=f22] { font-size:22px!important; }
				*[class~=center] { margin:0 auto!important; }
				*[class~=none] { display:none; }
				*[class~=aligncentre] { text-align:center!important; }
			}
		</style>
		<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
	</head>';

	$mailmessage 	 	.= '<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" bgcolor="#F4F4F4" text="#000000" link="#6C000E" vlink="#6C000E">';
	$mailmessage 	 	.= '<center>';
	//BODY
	$mailmessage 	 	.= '<table cellspacing="0" cellpadding="0" width="100%" border="0"><tr><td align="center" bgcolor="#F4F4F4">';
	$mailmessage 	 	.= '<!--[if (gte mso 9)|(IE)]><table border="0" cellpadding="0" cellspacing="0" width="640" style="width:640px;" class="general"><tr><td align="left" valign="top"><![endif]-->';

	$mailmessage 	 	.= '<table border="0" cellpadding="0" cellspacing="0" class="general" style="width:100%; Max-Width:640px; margin-top:20px;"><tr><td align="center">';
	$mailmessage 	 	.= '<!--DEBUT CONTENUS-->';

	$mailmessage 	 	.= '<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" style="border:1px solid #CCCCCC;" class="w320">';
	$mailmessage 	 	.= '<tr><td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; padding:8px;" align="center">';
	$mailmessage 	 	.= '<table width="600" style="width:600px;" cellpadding="0" cellspacing="0" border="0" class="w320">';

	$mailmessage 	 	.= '<tr><td valign="middle">';
	$mailmessage 	 	.= '<table width="200" style="width:200px;" align="left" cellpadding="0" cellspacing="0" border="0" class="w320">
								<tr>
									<td height="72" align="center" style="height:72px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839;">
										<img src="' . $lead_logo_src . '" width="200" height="72" style="display:block; border:0;" alt="' . $lead_logo_alt . '" />
									</td>
								</tr>
							</table>';
	$mailmessage 	 	.= '<table width="320" style="width:320px;" align="right" cellpadding="0" cellspacing="0" border="0" class="w320">
								<tr>
									<td height="72" align="right" valign="middle" class="h50 aligncentre" style="height:72px; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#333333;">
										<strong style="color:#0000ff;">' . $trad_coupons['lead']['sujet'] . '</strong><br />
										<span>'. $par_annonceur .'</span>
									</td>
								</tr>
							</table>';
	$mailmessage 	 	.= '</td></tr>';
	$mailmessage 	 	.= '<tr>
								<td height="1" style="height:1px; line-height:1px;" bgcolor="#e9e7e7"><img src="visuals/blank.gif" width="1" height="1" style="display:block;" /></td>
							</tr>';
	$mailmessage 	 	.= '<tr>
								<td height="20" style="height:20px; line-height:20px;">&nbsp;</td>
							</tr>';
	$mailmessage 	 	.= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839;">';

	$mailmessage 	 	.= $trad_coupons['lead']['texte1'] .'<strong>'. date("d/m/y") .'</strong> '. $trad_coupons['lead']['texte2'] .'<a href="mailto:'.$email.'" style="color:#208BCC;">'.$email.'</a> '. $trad_coupons['lead']['texte3'] .'<br />
							<strong style="font-size:16px;">('. $operation .' - <span style="color:#0000ff;">'. $annonceur_code[$i] .'</span>)</strong><br />
							<br />';

	$mailmessage 	 	.= '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%; border:1px solid #CCCCCC; border-collapse:collapse">';
	$mailmessage 	 	.= '<tr>
								<th width="30%" bgcolor="#EEEEEE" style="width:30%; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; border-bottom:1px solid #dedede; padding:5px;" >'. $trad_coupons['lead']['col1'] .'</th>
								<th width="70%" bgcolor="#EEEEEE" style="width:70%; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; border-bottom:1px solid #dedede; padding:5px;" >'. $trad_coupons['lead']['col2'] .'</th>
							</tr>';

	/* debut des valeurs */
						// ECHEANCE DU PROJET
						if ($annonceur_echeances[$i] !="") {
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_annonceur_echeances'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $annonceur_echeances[$i] .'</td>
						</tr>';
						}

						//TYPE DE BESOIN
						if (isset($besoin) and $besoin!="") {
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_besoin'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$besoin.'</td>
						</tr>';
						}

						//QUESTION
						if (isset($question) and $question!="Précisez si besoin est votre jour de prédilection.") {
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_question'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$question.'</td>
						</tr>';
						}

						//CIVILITE / TITRE
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_titre'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$titre.'</td>
						</tr>';

						//NOM
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_nom'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$nom.'</td>
						</tr>';

						//PRENOM
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_prenom'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$prenom.'</td>
						</tr>';

						//EMAIL
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_email'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><a href="mailto:'.$email.'" style="color:#208BCC;">'.$email.'</a></td>
						</tr>';

						//FONCTION
						if ($fonction !="") {
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_fonction'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$fonction.'</td>
						</tr>';
						}

						//SERVICE
						if ($service !="") {
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_service'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$service.'</td>
						</tr>';
						}

						//SOCIETE
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_societe'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$societe.'</td>
						</tr>';

						//ADRESSE
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_adresse'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$adresse.'</td>
						</tr>';

						//ADRESSE2
						if ($adresse2 !="") {
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_adresse2'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$adresse2.'</td>
						</tr>';
						}

						//CP
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_cp'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$cp.'</td>
						</tr>';

						//VILLE
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_ville'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$ville.'</td>
						</tr>';

						//PAYS
						if ($pays !="") {
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_pays'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$pays.'</td>
						</tr>';
						}

						//SECTEUR
						if ($secteur !="") {
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_secteur'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$secteur.'</td>
						</tr>';
						}

						//EFFECTIF
						if ($effectif !="") {
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_effectif'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$effectif.'</td>
						</tr>';
						}

						//TEL
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_tel'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$tel.'</td>
						</tr>';

						//MOBILE
						if ($mobile !="") {
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_mobile'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$mobile.'</td>
						</tr>';
						}

						//FAX
						if ($fax !="") {
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_fax'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$fax.'</td>
						</tr>';
						}

						//SIREN
						if ($siren !="") {
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_siren'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$siren.'</td>
						</tr>';
						}

						//NAF
						if ($naf !="") {
						$mailmessage .= '<tr>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $trad_coupons['lead']['t_naf'] .'</strong></td>
							<td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'.$naf.'</td>
						</tr>';
						}

						//QUALIFs
						if ($qualif1 !=""){  $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name1  .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif1  .'</td></tr>'; }
						if ($qualif2 !=""){  $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name2  .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif2  .'</td></tr>'; }
						if ($qualif3 !=""){  $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name3  .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif3  .'</td></tr>'; }
						if ($qualif4 !=""){  $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name4  .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif4  .'</td></tr>'; }
						if ($qualif5 !=""){  $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name5  .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif5  .'</td></tr>'; }
						if ($qualif6 !=""){  $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name6  .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif6  .'</td></tr>'; }
						if ($qualif7 !=""){  $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name7  .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif7  .'</td></tr>'; }
						if ($qualif8 !=""){  $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name8  .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif8  .'</td></tr>'; }
						if ($qualif9 !=""){  $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name9  .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif9  .'</td></tr>'; }
						if ($qualif10 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name10 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif10 .'</td></tr>'; }
						if ($qualif11 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name11 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif11 .'</td></tr>'; }
						if ($qualif12 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name12 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif12 .'</td></tr>'; }
						if ($qualif13 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name13 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif13 .'</td></tr>'; }
						if ($qualif14 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name14 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif14 .'</td></tr>'; }
						if ($qualif15 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name15 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif15 .'</td></tr>'; }
						if ($qualif16 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name16 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif16 .'</td></tr>'; }
						if ($qualif17 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name17 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif17 .'</td></tr>'; }
						if ($qualif18 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name18 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif18 .'</td></tr>'; }
						if ($qualif19 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name19 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif19 .'</td></tr>'; }
						if ($qualif20 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name20 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif20 .'</td></tr>'; }
						if ($qualif21 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name21 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif21 .'</td></tr>'; }
						if ($qualif22 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name22 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif22 .'</td></tr>'; }
						if ($qualif23 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name23 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif23 .'</td></tr>'; }
						if ($qualif24 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name24 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif24 .'</td></tr>'; }//Source fichier
						if ($qualif25 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name25 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif25 .'</td></tr>'; }
						if ($qualif26 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name26 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif26 .'</td></tr>'; }
						if ($qualif27 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name27 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif27 .'</td></tr>'; }
						if ($qualif28 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name28 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif28 .'</td></tr>'; }
						if ($qualif29 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name29 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif29 .'</td></tr>'; }
						if ($qualif30 !=""){ $mailmessage .= '<tr><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top"><strong>'. $qualif_name30 .'</strong></td><td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#363839; border:1px solid #dedede; padding:5px;" valign="top">'. $qualif30 .'</td></tr>'; }

	/* fin des valeurs */
	$mailmessage 	 	.= '</table>';

	//$mailmessage 	 	.= '<br />'. $trad_coupons['lead']['textefin'] .'<br />';
	$mailmessage 	 	.= '</td></tr>';
	$mailmessage 	 	.= '</table>';
	$mailmessage 	 	.= '</td></tr>';
	$mailmessage 	 	.= '<tr>
								<td height="10" style="height:10px; line-height:10px; font-size:10px;">&nbsp;</td>
							</tr>';
	$mailmessage 	 	.= '<tr>
								<td height="63" class="h40" align="center" valign="middle" bgcolor="#363839" style="height:63px; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#FFFFFF;">'. $trad_coupons['lead']['info'] .'</td>
							</tr>';
	$mailmessage 	 	.= '</table>';

	$mailmessage 	 	.= '<table width="100%" align="center" cellpadding="3" cellspacing="0" border="0" class="w320">
								<tr>
									<td height="40" valign="middle" align="center" style="height:40px; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#363839">'. $trad_coupons['lead']['footer'] .'</td>
								</tr>
							</table>';

	$mailmessage 	 	.= '<!--FIN CONTENUS-->';
	$mailmessage 	 	.= '</td></tr></table>';
	$mailmessage 	 	.= '<!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->';
	$mailmessage 	 	.= '</td></tr></table>';
	$mailmessage 	 	.= '</center>';
	$mailmessage 	 	.= '</body>';
	$mailmessage 	 	.= '</html>';
	//$mailmessage .= "ID$source$formtype$nom XYZ<br />\n";
	/* FIN CONTENU LEAD */

	// Test s'il y a déjà un coupon lié à l'email pour cette opération
	$sqlTestCoupon = "SELECT email  FROM `t_coupon` WHERE `id_operation` = '" . quote_smart($operation) . "' AND `email` = '" . quote_smart($email) . "' AND `envoyer`='True' LIMIT 1";
	$resTestCoupon = mysql_query($sqlTestCoupon);
	$nbCoupon = mysql_num_rows($resTestCoupon);

	// Si c'est du click to lead et qu'il y a déjà un coupon alors ne pas envoyer d'autoreply
	if($nbCoupon>0 && $is_ctl === true) {
		$autoresp = "False";
	}

	if (($mail_france == "True") and ($mail_valid=="True")) {
		$objet = $formname . " [" . $operation . "-" . $annonceur_code[$i] . "]"  ;
		//mail($annonceur_emails[$i], "$objet", $mailmessage, "From: {$email}\nReply-To: {$email}\nContent-type: text/html" );
		//mail("olivier@charter-multimedia.com", "$formname", $mailmessage, "From: $email\nContent-type: text/html" );
        $data = array();
        $data['bodyHTML'] = utf8_encode($mailmessage);
        $data['bodyText'] = strip_tags(utf8_encode($mailmessage), '<a><br>');
        $data['to'] = $annonceur_emails[$i];
        $data['toName'] = '';
        $data['from'] = 'leads@lescomptes.fr';
        $data['fromName'] = '';
        $data['replyTo'] = 'leads@lescomptes.fr';
        $data['replyToName'] = '';
        $data['subject'] = html_entity_decode($objet);

		$data['vmta'] = 'vmta-vm-trans';
		sendEmail($data);

		//ZONE AUTOREPLY
		if ($autoresp == "True") {
		//if ($autoresp == "True" && $url == "www.vertical-mail.com/" . $operation . "/10.php") { //uniquement page 10

			if($qualif1 == 1) {
				$emailfile = fopen("https://www.vertical-mail.com/" . $operation . "/autoreply.php?mailer=AUTO","r");
				$autoresp_subject =  "~ Bienvenue dans l'univers Nespresso"; //Objet du mail
			} else  {
				$emailfile = fopen("https://www.vertical-mail.com/" . $operation . "/autoreply2.php?mailer=AUTO","r");
				$autoresp_subject =  "~ Profitez dès maintenant de votre offre"; //Objet du mail
			}

			/*
				//ici on peut modifier $emailfile si il y a plusieurs autoreply suivant qualif

			if($qualif5 == $reunions["reunion_1"]["value"]){ //DATE 1
				$autoreply = "https://www.vertical-mail.com/" . $operation . "/autoreply_date_1.php";
			} elseif($qualif5 == $reunions["reunion_2"]["value"]){ //DATE 2
				$autoreply = "https://www.vertical-mail.com/" . $operation . "/autoreply_date_2.php";
			} elseif($qualif5 == $reunions["reunion_3"]["value"]){ //DATE 3
				$autoreply = "https://www.vertical-mail.com/" . $operation . "/autoreply_date_3.php";
			} elseif($qualif5 == $reunions["reunion_4"]["value"]){ //DATE 4
				$autoreply = "https://www.vertical-mail.com/" . $operation . "/autoreply_date_4.php";
			} else {
				$autoreply = "https://www.vertical-mail.com/" . $operation . "/autoreply.php";
			}

			$emailfile = fopen($autoreply,"r");

			//...
			*/

			$contenu = "";
			while(!feof($emailfile)) {
				$line = fgets($emailfile);
				$line = str_replace("Madame, Monsieur","{$prenom} {$nom}",$line);
				$line = str_replace(".php",".php?src=EXT&email={$email}&pre={$prenom}&nom={$nom}&qualif5={$qualif5}",$line);
				$line = str_replace("[CODE_PROMO]",$qualif5,$line);
				$contenu .= $line;
			}
			$contenu = preg_replace('/<(a|img)\s(href|src)="(?!(http:\/\/|mailto:))([^"]+)"([^>]*)>/i','<$1 $2="https://asst1.vtml.fr/' . $operation . '/$4"$5>',$contenu);

			$boundary = uniqid('np');

			$contenuTxt = "Madame, Monsieur,\n";
			$contenuTxt .= "\n";
			$contenuTxt .= "Suite à votre demande d'information, " . $autoresp_from . " vous a envoyé un autoreply\n";
			$contenuTxt .= "Si votre messagerie n'affiche pas le html, vous pouvez le visionner en suivant ce lien :\n";
			$contenuTxt .= "https://asst1.vtml.fr/" . $operation . "/autoreply.php\n";

			$subject = utf8_encode(html_entity_decode($autoresp_subject));
			//$subject="=?UTF-8?B?".base64_encode($subject)."?=\n";

			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "From: " . html_entity_decode($autoresp_from) . "<" . html_entity_decode($autoresp_reply) . ">\r\n";
			$headers .= "Subject: ".html_entity_decode($subject)." \r\n";
			$headers .= "Reply-To: " .html_entity_decode($autoresp_reply) . "\r\n";
			$headers .= "Content-Type: multipart/alternative;boundary=" . $boundary . "\r\n";


			/*$message = "This is a MIME encoded message.";

			$message .= "\r\n\r\n--" . $boundary . "\r\n";
			$message .= "Content-type: text/plain;charset=utf-8\r\n\r\n";
			$message .= $contenuTxt;

			$message .= "\r\n\r\n--" . $boundary . "\r\n";
			$message .= "Content-type: text/html;charset=utf-8\r\n\r\n";
			$message .= $contenu;

			$message .= "\r\n\r\n--" . $boundary . "--";*/

			//mail($email,$subject, $message, $headers);

			$data = array();
			$data['bodyHTML'] = utf8_encode($contenu);
			$data['bodyText'] = utf8_encode($contenuTxt);
			$data['to'] = $email;
			$data['toName'] = '';
			$data['from'] = 'noreply@vtml-trans.fr';
			$data['fromName'] = $autoresp_from;
			$data['replyTo'] = 'noreply@vtml-trans.fr';
			$data['replyToName'] = '';
			$data['subject'] = html_entity_decode($subject);

			$data['vmta'] = 'vmta-vm-trans';
			sendEmail($data);
		}

		//ici on peut ajouter des spécificité CRM

		//Tracking POSTBACK

		$postback_url = "https://tracking.publicidees.com/PIk-back/img?progid=7902&comid=1757076&iu=47419c106d839411b06f583866adf520&uniqid=" . $qualif29 . "&data=&eventid=" . $qualif28;

		$ch = curl_init($postback_url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$webResult = curl_exec($ch);

		$file="/home/verticalmail/campagnes/logs_cazelis/".$operation.".txt";
		$today = date("d/m/Y  H:i:s");

		$result = "==========================\r\nDate : ".$today."\r\nEmail : ".$email."\r\nRetour curl: ".$webResult."\r\nID : ".$qualif29."\r\nCLICK_ID : ".$qualif28."\r\n==========================\r\n";

		file_put_contents($file, $result, FILE_APPEND);

		curl_close($ch);


		//FIN ZONE AUTOREPLY


		//ZONE TRANSFERT
		if($transfert_module===true) {
			$transfert_cope_ope = ($transfert_cope_ope!="")?$transfert_cope_ope:$operation;

			$emailfile = fopen("https://www.vertical-mail.com/" . $transfert_cope_ope . "/index.php?file=VI","r");

			$contenuBrut = "";
			while(!feof($emailfile)) {
				$contenuBrut .= fgets($emailfile);
			}
			$contenuBrut = str_replace("?src=&tit=&nom=&pre=&email=&soc=&ad1=&ad2=&cp=&vil=&pays=&tel=&fax=&mob=&sec=&fon=&eff=&siret=&siren=&naf=&naf2008=&campaign_id=&sending_id=&base_id=&contact_id=","", $contenuBrut);
			$contenuBrut = preg_replace('/<(a|img)\s(href|src)="http:\/\/www.vertical-mail.com\/' . $transfert_cope_ope . '\/([^"]*)"([^>]*)>/i','<$1 $2="https://www.vertical-mail.com/' . $transfert_cope_ope . '/$3?src=&nom=&pre=&email="$4>',$contenuBrut);

			foreach ($transfert_blocs as $group=>$fields) {
				unset($fields["group_name"]);
				$transfert_valid = true;
				foreach ($fields as $field=>$type) {
					if($$field==""){
						$transfert_valid = false;
					}
					${$type."_dest"} = $$field;
				}

				if($transfert_valid===true) {
					$contenu = ereg_replace("Madame, Monsieur","Cher(e) {$nom_dest} {$prenom_dest}",$contenuBrut);
					$contenu = str_replace("src=&nom=&pre=&email=","src=".urlencode(html_entity_decode($source))."&nom=".urlencode(html_entity_decode($nom_dest))."&pre=". urlencode(html_entity_decode($prenom_dest))."&email=".urlencode(html_entity_decode($email_dest))."&qualif25=".urlencode(html_entity_decode($email)), $contenu);
					$boundary = uniqid('np');

					$contenuTxt = "Cher(e) {$nom_dest} {$prenom_dest},\n";
					$contenuTxt .= "\n";
					$contenuTxt .= trim("{$titre} {$nom} {$prenom}")." vous a envoyé un message.\n";
					$contenuTxt .= "Si votre messagerie n'affiche pas le html, vous pouvez le visionner en suivant ce lien :\n";
					$contenuTxt .= "https://www.vertical-mail.com/" . $transfert_cope_ope . "/?src=".urlencode(html_entity_decode($source))."&nom=".urlencode(html_entity_decode($nom_dest))."&pre=". urlencode(html_entity_decode($prenom_dest))."&email=".urlencode(html_entity_decode($email_dest))."&qualif25=".urlencode(html_entity_decode($email))."\n";

					$data = array();
					$data['bodyHTML'] = utf8_encode($contenu);
					$data['bodyText'] = utf8_encode($contenuTxt);
					$data['to'] = html_entity_decode($email_dest);
					$data['toName'] = html_entity_decode($nom_dest." ".$prenom_dest);
					$data['from'] = 'noreply@lescomptes.fr';

					$myname = html_entity_decode($nom." ".$prenom, ENT_QUOTES);
					$myname = mb_encode_mimeheader($myname, "ISO-8859-1", "Q");
					//$data['fromName'] = html_entity_decode($nom." ".$prenom);
					$data['fromName'] = $myname;
					$data['replyTo'] = html_entity_decode($email);
					//$data['replyToName'] = html_entity_decode($nom." ".$prenom);
					$data['replyToName'] = $myname;

					$data['subject'] = html_entity_decode($subject_transfert);

					$data['vmta'] = 'vmta-vm-trans';
					sendEmail($data);
				}
			}

		}
		//FIN ZONE TRANSFERT
	}

	$saisie  = "";
	$saisie .= date("d/m/y");
	$saisie .= "|" . $source;
	$saisie .= "|" . $operation;
	$saisie .= "|" . $annonceur_emails[$i];
	$saisie .= "|" . $annonceur_echeances[$i];
	$saisie .= "|" . $formname;
	$saisie .= "|" . $formtype;

	//Societe

	$saisie .= "|" . $societe;
	$saisie .= "|" . $adresse;
	$saisie .= "|" . $cp;
	$saisie .= "|" . $ville;
	$saisie .= "|" . $pays;
	$saisie .= "|" . $secteur;
	$saisie .= "|" . $effectif;

	//Contact

	$saisie .= "|" . $titre;
	$saisie .= "|" . $nom;
	$saisie .= "|" . $prenom;
	$saisie .= "|" . $email;
	$saisie .= "|" . $tel;
	$saisie .= "|" . $fax;
	$saisie .= "|" . $fonction;
	$saisie .= "|" . $service;

	//Divers

	$saisie .= "|" . $page_url;

	//Qualif (toujour à la fin)

	$saisie .= "|" . $qualif1;
	$saisie .= "|" . $qualif2;
	$saisie .= "|" . $qualif3;
	$saisie .= "|" . $qualif4;
	$saisie .= "|" . $qualif5;
	$saisie .= "|" . $qualif6;
	$saisie .= "|" . $qualif7;
	$saisie .= "|" . $qualif8;
	$saisie .= "|" . $qualif9;
	$saisie .= "|" . $qualif10;
	$saisie .= "|" . $qualif11;
	$saisie .= "|" . $qualif12;
	$saisie .= "|" . $qualif13;
	$saisie .= "|" . $qualif14;
	$saisie .= "|" . $qualif15;
	$saisie .= "|" . $qualif16;
	$saisie .= "|" . $qualif17;
	$saisie .= "|" . $qualif18;
	$saisie .= "|" . $qualif19;
	$saisie .= "|" . $qualif20;
	$saisie .= "|" . $qualif21;
	$saisie .= "|" . $qualif22;
	$saisie .= "|" . $qualif23;
	$saisie .= "|" . $qualif24;
	$saisie .= "|" . $qualif25;
	$saisie .= "|" . $qualif26;
	$saisie .= "|" . $qualif27;
	$saisie .= "|" . $qualif28;
	$saisie .= "|" . $qualif29;
	$saisie .= "|" . $qualif30;
	$saisie .= "|" . $optin_vm;
	$saisie .= "|" . $besoin;
	$saisie .= "|" . $question;
	$saisie .= "\n";

	// SAUVEGARDER

	fputs($fp,$saisie);

	//Special Treatment Routage Externe Officiel CE
	if (preg_match('/officiel(-prevention|ce|rh).com/', $email)) {
		$mail_france = "False";
	}
	if (preg_match('/(officielce|OFFICIELCE|officielrh|OFFICIELRH)/', $societe)) {
		$mail_france = "False";
	}

	if (preg_match('/VM-SE S A/', $societe)) {
		$mail_france = "False";
	}
	//End Special Treatment Routage Externe Officiel CE

	//test si pays = France

	if (($mail_france == "True") and ($mail_valid=="True")) {
		$valider = "True";
		$envoyer = "True";
	} else {
		$valider = "False";
		$envoyer = "False";
	}

	//si formulaire de sol mise en attente pour les envoies
	// condition supprimer pour l'instant, pb avec les opération soloxxxxxxx
	//if (substr($operation,0,3)=="sol") {
	//        $valider="Null";
	//        $envoyer="False";
	//}

	if ( !($operation == 'solocote200311' && $mail_france == 'False')) {

		//enregistrement dans la base de données

		/*$nom = strtoupper(vm($nom));
		$prenom = strtoupper(vm($prenom));
		$fonction = vm($fonction);
		$service = vm($service);
		$societe = strtoupper(vm($societe));
		$secteur = vm($secteur);
		$effectif = vm($effectif);
		$adresse = strtoupper(vm($adresse));
		$adresse2 = strtoupper(vm($adresse2));
		$ville = strtoupper(vm($ville));
		$pays = strtoupper(vm($pays));*/

		//enregistrement dans la base de données
        $nom = html_entity_decode($nom, ENT_COMPAT, 'ISO-8859-1');
        $prenom = html_entity_decode($prenom, ENT_COMPAT, 'ISO-8859-1');
        $fonction = vm($fonction);
        $service = vm($service);
        $societe = html_entity_decode($societe, ENT_COMPAT, 'ISO-8859-1');
        $secteur = vm($secteur);
        $effectif = vm($effectif);
        $adresse = html_entity_decode($adresse, ENT_COMPAT, 'ISO-8859-1');
        $adresse2 = html_entity_decode($adresse2, ENT_COMPAT, 'ISO-8859-1');
        $ville = html_entity_decode($ville, ENT_COMPAT, 'ISO-8859-1');
        $pays = html_entity_decode($pays, ENT_COMPAT, 'ISO-8859-1');


		   if($campaign_id=="") {
                      $campaign_id=0;
                   }
                   if($sending_id=="") {
                      $sending_id=0;
                   }
                   if($contact_id=="") {
                      $contact_id=0;
                   }

		$sql = "INSERT INTO t_coupon ";
		$sql.="(date,url,formtype,id_operation,source,id_client,echeance,formname,societe,adresse,adresse2,cp,";
		$sql.="ville,pays,secteur,effectif,naf,siret,siren,titre,nom,prenom,email,tel,mobile,fax,fonction,service,optin_vm,qualif1,qualif2,qualif3,qualif4,qualif5,qualif6,qualif7,qualif8,qualif9,qualif10,qualif11,qualif12,qualif13,qualif14,qualif15,qualif16,qualif17,qualif18,qualif19,qualif20,qualif21,qualif22,qualif23,qualif24,qualif25,qualif26,qualif27,qualif28,qualif29,qualif30,besoin,question,valider,envoyer,ip,navigateur,campaign_id,sending_id,contact_id,redistribuer)";//ajouter 'redistribuer' pour CTL
		$sql.="VALUES('" . date("Y-m-j H:i:s") . "','" . quote_smart($page_url) . "','" . quote_smart($formtype) . "','" . quote_smart($operation) . "','" . quote_smart($source) . "','" . quote_smart($annonceur_emails[$i]) . "','" . quote_smart($annonceur_echeances[$i]) . "', '" . quote_smart($formname) . "','" . quote_smart($societe) . "','" . quote_smart($adresse) . "','" . quote_smart($adresse2) . "','" . quote_smart($cp) . "','" . quote_smart($ville) . "','" . quote_smart($pays) . "','" . quote_smart($secteur) . "','" . quote_smart($effectif) . "','" . quote_smart($naf) . "','" . quote_smart($siret) . "','" . quote_smart($siren) . "','" . quote_smart($titre) . "','" . quote_smart($nom) . "','" . quote_smart($prenom) . "',";
		$sql.="'" . quote_smart($email) . "','" . quote_smart($tel) . "','" . quote_smart($mobile) . "','" . quote_smart($fax) . "','" . quote_smart($fonction) . "','" . quote_smart($service) . "','" . quote_smart($optin_vm) . "','" . quote_smart($qualif1) . "','" . quote_smart($qualif2) . "','" . quote_smart($qualif3) . "','" . quote_smart($qualif4) . "','" . quote_smart($qualif5) . "','" . quote_smart($qualif6) . "','" . quote_smart($qualif7) . "','" . quote_smart($qualif8) . "','" . quote_smart($qualif9) . "','" . quote_smart($qualif10) . "','" . quote_smart($qualif11) . "','" . quote_smart($qualif12) . "','" . quote_smart($qualif13) . "','" . quote_smart($qualif14) . "','" . quote_smart($qualif15) . "','" . quote_smart($qualif16) . "','" . quote_smart($qualif17) . "','" . quote_smart($qualif18) . "','" . quote_smart($qualif19) . "','" . quote_smart($qualif20) . "','" . quote_smart($qualif21) . "','" . quote_smart($qualif22) . "','" . quote_smart($qualif23) . "','" . quote_smart($qualif24) . "','" . quote_smart($qualif25) . "','" . quote_smart($qualif26) . "','" . quote_smart($qualif27) . "','" . quote_smart($qualif28) . "','" . quote_smart($qualif29) . "','" . quote_smart($qualif30) . "','" . quote_smart($besoin) . "','" . quote_smart($question) . "','" . quote_smart($valider) . "','" . quote_smart($envoyer) . "','" . quote_smart($ip) . "','" . quote_smart($browser) . "'," . quote_smart($campaign_id) . "," . quote_smart($sending_id) . "," . quote_smart($contact_id) . ", 'lock,CTL')";// ajouter 'lock,CTL' pour CTL
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());


    //Récupération du siren chez societe.com

    if($societe!="" && $cp!="") {
    $soc=urlencode(trim($societe));
    $dep=urlencode(trim(substr($cp,0,2)));

    $fichier = "http://partxml.societe.com/cgi-bin/listeensxml?nom={$soc}&dep={$dep}&user=vmail&pass=bhfcLB12&nbrep=1000";
    $dom = new DomDocument();
    if($dom->load($fichier)) {
        $siren="";
        $Societe = $dom->getElementsByTagName('result');
        foreach($Societe as $Siren) {
			$Ssiren=$Siren->getElementsByTagName("siren")->item(0)->nodeValue;
			$Ssociete=strtoupper($Siren->getElementsByTagName("rs")->item(0)->nodeValue);
			$Sadresse=strtoupper($Siren->getElementsByTagName("adr")->item(0)->nodeValue);
			$Scp=$Siren->getElementsByTagName("cp")->item(0)->nodeValue;
			$Sape=$Siren->getElementsByTagName("ape")->item(0)->nodeValue;
			$temp_cp=$Scp;
			$Scp=substr($temp_cp,0,5);
			$Sville=substr($temp_cp,6);
			if($Ssiren!="") {
				// print("$siren |  $societe | $adresse | $cp | $ape <br>");
				$sql="insert into t_coupon_siret (date,id_operation,email,source,siren,societe,adresse,cp,ville,naf) VALUES('" . date("Y-m-d H:i:s") . "','" . quote_smart($operation) . "','" . quote_smart($email) . "','" . quote_smart($source) . "','" . quote_smart($Ssiren) . "','" . quote_smart($Ssociete) . "','" . quote_smart($Sadresse) . "','" . quote_smart($Scp) . "','" . quote_smart($Sville) . "','" . quote_smart($Sape) . "')";
				$req=mysql_query($sql) or die('Erreur SQL !\n'.$sql.'\n'.mysql_error());
			}
		}

     }

    }
    //Fin Récupération des siren

	}
}

fclose($fp);

//} // if $mail_valid = "True"

// VARIABLES SESSION

$_SESSION["s_contact_id"]	= $contact_id;
$_SESSION["s_base_id"]		= $base_id;
$_SESSION["s_campaign_id"]	= $campaign_id;
$_SESSION["s_sending_id"]	= $sending_id;

$_SESSION["s_source"]		= $source;
$_SESSION["s_titre"]		= $titre;
$_SESSION["s_nom"]			= $nom;
$_SESSION["s_prenom"]		= $prenom;
$_SESSION["s_email"]		= $email;
$_SESSION["s_fonction"]		= $fonction;
$_SESSION["s_service"]		= $service;
$_SESSION["s_societe"]		= $societe;
$_SESSION["s_secteur"]		= $secteur;
$_SESSION["s_effectif"]		= $effectif;
$_SESSION["s_adresse"]		= $adresse;
$_SESSION["s_adresse2"]		= $adresse2;
$_SESSION["s_cp"]			= $cp;
$_SESSION["s_ville"]		= $ville;
$_SESSION["s_pays"]			= $pays;
$_SESSION["s_tel"]			= $tel;
$_SESSION["s_mobile"]		= $mobile;
$_SESSION["s_fax"]			= $fax;
$_SESSION["s_operation"]	= $operation;
$_SESSION["s_formname"]		= $formname;

$_SESSION["s_qualif1"]		= $qualif1;
$_SESSION["s_qualif2"]		= $qualif2;
$_SESSION["s_qualif3"]		= $qualif3;
$_SESSION["s_qualif4"]		= $qualif4;
$_SESSION["s_qualif5"]		= $qualif5;
$_SESSION["s_qualif6"]		= $qualif6;
$_SESSION["s_qualif7"]		= $qualif7;
$_SESSION["s_qualif8"]		= $qualif8;
$_SESSION["s_qualif9"]		= $qualif9;
$_SESSION["s_qualif10"]		= $qualif10;
$_SESSION["s_qualif11"]		= $qualif11;
$_SESSION["s_qualif12"]		= $qualif12;
$_SESSION["s_qualif13"]		= $qualif13;
$_SESSION["s_qualif14"]		= $qualif14;
$_SESSION["s_qualif15"]		= $qualif15;
$_SESSION["s_qualif16"]		= $qualif16;
$_SESSION["s_qualif17"]		= $qualif17;
$_SESSION["s_qualif18"]		= $qualif18;
$_SESSION["s_qualif19"]		= $qualif19;
$_SESSION["s_qualif20"]		= $qualif20;
$_SESSION["s_qualif21"]		= $qualif21;
$_SESSION["s_qualif22"]		= $qualif22;
$_SESSION["s_qualif23"]		= $qualif23;
$_SESSION["s_qualif24"]		= $qualif24;
$_SESSION["s_qualif25"]		= $qualif25;
$_SESSION["s_qualif26"]		= $qualif26;
$_SESSION["s_qualif27"]		= $qualif27;
$_SESSION["s_qualif28"]		= $qualif28;
$_SESSION["s_qualif29"]		= $qualif29;
$_SESSION["s_qualif30"]		= $qualif30;
$_SESSION["s_echeance1"]	= $echeance1;
$_SESSION["s_siren"]		= $siren;
$_SESSION["s_siret"]		= $siret;
$_SESSION["s_naf"]			= $naf;
$_SESSION["s_id_distrib"]	= $dest1;


// FINISHED

if ($mail_valid == "True") {
	if ($popup!="") {
	//		header( "Location: $popup" );
	?>
	<html>
	<script language="JAVASCRIPT">
	function WinOpen() {
		<?php if ($_SESSION["s_nom"] != ""): ?>
		open("<?php echo $popup?>","Popup","width=250,height=400,scrollbars");
		<?php endif; ?>
	}
	</script>

	<head>
		<meta http-equiv="Refresh" content="1; URL=<?php echo $destination_good ?>">
	</head>

	<body bgcolor="#999999" onLoad="WinOpen()">
		<h1>&nbsp;</h1>
	</body>
	</html>

	<?php
	} else {
                if($campaign_id>1) {
                	$handle = fopen("http://vm.64.vertical-mail.net/front/push/coupon?contact_id=" . $contact_id . "&base_id=" . $base_id . "&campaign_id=" . $campaign_id . "&sending_id=" . $sending_id, "r");
                        while(!feof($handle)) {
                             $result =fgets($handle);
                        }
                        fclose($handle);

                        //$log = fopen('https://www.vertical-mail.com/solochal0701grat2/log.txt', 'a+');
                        $log = fopen('/var/web/vertical-mail/_log/log.txt', 'a+');
                        $contenu=date("Y-m-j H:i:s") . ";" . $result . ";" . $ip . ";" . $email . ";" . $operation . ";" . $contact_id . ";" . $base_id . ";" . $campaign_id . ";" . $sending_id ."\n";
                        fwrite($log, $contenu);
                }

    /*
    if(file_exists("../$operation/autoreply.php")) {
        include("../$operation/autoreply.php");
    } else{
        include("../include/autoreply.php");
    }
    */

		if($is_ctl === false) {
			header( "Location: {$destination_good}" );
			exit;
		} else {
			echo toJson($_SESSION);
			exit;
		}
	}

} else {
	if ($destination_bad == "")	{
		//$destination_bad = "http://{$url}";
		$destination_bad = "https://{$url}";
	}
	$destination_bad = $destination_bad . "#form" ;
	if($is_ctl === false) {
		header( "Location: {$destination_bad}" );
		exit;
	} else {
		echo toJson($_SESSION);
		exit;
	}
}

function toJson($params) {
    $return = array();
    foreach($params as $key=>$value) {
        $return[$key] = htmlentities($value, ENT_COMPAT, 'ISO-8859-1');
        //$return[$key] = $value;
    }
    return json_encode($return);
}
