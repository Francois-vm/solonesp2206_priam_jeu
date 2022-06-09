<?php
/*
 * TemplateName: standard_solo_GLOBAL
 *
 * @version: 1.1 - 03/2017
 */

/*FIX2009-11-26*/ include_once('/home/verticalmail/includes.php');

$par_langue = 'fr_FR';//langue de la page fr_FR, en_EN, es_ES

$caller = 'page_10';//champ oblig $mandatory_fields : page_10, page_20...

include_once("parametres.inc");
include("../include/scripts_solo_new.inc");
include("../include/php_headers.inc");
ob_start("rewrite_pages");

$popuperror = "<div id=\"erreurdiv\" onclick=\"javascript:document.getElementById('erreurdiv').style.visibility = 'hidden';\"><div class=\"popuperror\"><p align=\"right\" class=\"bt_close\"><img src=\"visuals/lp_good/close.png\" style=\"margin:0\"></p>" . stripslashes($_SESSION["erreur_saisie"]) . "</div></div>";

$_lt = "hp";

// Bloquer le formulaire si quota d'INSCRIPTION (coupon) remplis
if ( $inscription_limiter == true ) {
	include("../include/db.inc");

	$sql = "select count(*) as nbcoupon from t_coupon where id_operation='" . $par_operation . "' AND envoyer = 'true' group by id_operation";
	$req = mysql_query($sql) or die (mysql_error());
	$data = mysql_fetch_array($req);

	if($data['nbcoupon']>=$inscription_limiter_nombre){
		header( "Location:".$inscription_limiter_fichier_fin );
		exit();
	}
}

if ( $par_domaine == "CLIENT" ) {
	$_SESSION['s_nom'] 		= html_entity_decode($_SESSION['s_nom']);
	$_SESSION['s_prenom'] 	= html_entity_decode($_SESSION['s_prenom']);
	$_SESSION['s_societe'] 	= html_entity_decode($_SESSION['s_societe']);
	$_SESSION['s_fonction'] = html_entity_decode($_SESSION['s_fonction']);
	$_SESSION['s_adresse'] 	= html_entity_decode($_SESSION['s_adresse']);
	$_SESSION['s_adresse2'] = html_entity_decode($_SESSION['s_adresse2']);
	$_SESSION['s_ville'] 	= html_entity_decode($_SESSION['s_ville']);
	$_SESSION['s_qualif1']	= html_entity_decode($_SESSION['s_qualif1']);
	$_SESSION['s_qualif2'] 	= html_entity_decode($_SESSION['s_qualif2']);
	$_SESSION['s_qualif3'] 	= html_entity_decode($_SESSION['s_qualif3']);
	$_SESSION['s_qualif4'] 	= html_entity_decode($_SESSION['s_qualif4']);
	$_SESSION['s_qualif5'] 	= html_entity_decode($_SESSION['s_qualif5']);
	$_SESSION['s_qualif24'] = html_entity_decode($_SESSION['s_qualif24']);
}
?>
<!doctype html><?php /*?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php */?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $par_title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php if($par_responsive === true){ ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<?php } ?>
	<meta property="og:image" content="<?php echo $_hplt1; ?>visuals/vignette.jpg" />
	<meta property="og:title" content="<?php echo $par_annonceur; ?>" />
	<meta property="og:description" content="<?php echo $par_description; ?>" />

	<link rel="shortcut icon" href="<?php echo $lien_favicon ?>" type="image/x-icon" />

<?php /* FICHIER CSS */?>
	<link href="css/styles.css" rel="stylesheet" type="text/css" />

<?php /* Cible IE inférieur ou égal à 9 - alternative au placeholder */ ?>
	<!--[if lte IE 9]>
	<link href="<?php echo $style_form; ?>" rel="stylesheet" type="text/css" />
	<![endif]-->

<?php if($par_responsive === true){ ?>
	<link href="css/styles_responsive.css" rel="stylesheet" type="text/css" />
<?php } ?>

<?php if ($par_domaine == "CLIENT") { ?>
	<?php /* FICHIER JS + LIBRAIRIE JQUERY */?>
	<script src="https://www.vertical-mail.com/visuals/cw_open.js"></script>

	<?php /* FICHIER JS + LIBRAIRIE JQUERY */?>
	<script src="https://www.vertical-mail.com/include/js/jquery-1.7.2.min.js"></script>
	<script src="https://www.vertical-mail.com/include/js/jquery.easing.1.3.js"></script>
	<script src="https://www.vertical-mail.com/include/js/mailcheck/mailcheck.min.js"></script>
<?php } else { //VM ?>
	<?php /* FICHIER JS + LIBRAIRIE JQUERY */?>
	<script src="../visuals/cw_open.js"></script>

	<?php /* FICHIER JS + LIBRAIRIE JQUERY */?>
	<script src="../include/js/jquery-1.7.2.min.js"></script>
	<script src="../include/js/jquery.easing.1.3.js"></script>
	<script src="../include/js/mailcheck/mailcheck.min.js"></script>
<?php } ?>

<?php
	if($add_slider===true){
		include $slider_url_header;
	}
	if($add_fancybox===true){
		include $fancybox_url_header;
	}
?>

<?php
	/* EFFET PLACEHOLDER HORS DU CHAMPS SI REMPLI */
/*
	<script type="text/javascript" src="js/jquery.placeholder.label.js"></script>
	<script type="text/javascript">
		<!-- Appel du plugin placeholder animé -->
		$(document).ready(function (){
			//$('input[placeholder]').placeholderLabel(); //avec tous les paramètres par defaut

			$('input[placeholder]').placeholderLabel({
				placeholderColor: "#898989", 	//Color placeholder - #898989
				labelColor: "#4AA2CC", 			//Color label (after the focus) - #4AA2CC
				labelSize: "12px", 				//Size of label (after the focus) - 14px
			//	useBorderColor: true, 			//If true a border input is altered after focus
			//	inInput: true, 					//If true the label is actually in half vertically
				timeMove: 200 					//Time effect move after focus
			});
		})
	</script>
*/
?>
</head>

<body class="landing" id="pageLanding">
<div class="global">

<!-- Paramètres de formulaire -->
<form action="<?php echo $action; ?>" method="POST" name="contactinfo">
	<input type="HIDDEN" name="url"  value="<?php echo $_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"] ?>">
	<input type="HIDDEN" name="operation" value="<?php echo $par_operation ?>">
	<input type="HIDDEN" name="formname" value="<?php echo $par_formname; ?>">
	<input type="HIDDEN" name="formtype" value="DI">
	<input type="HIDDEN" name="popup" value="<?php echo $par_popup ?>">
	<input type="HIDDEN" name="destination_good" value="<?php echo $par_destination_good ?>">
	<input type="HIDDEN" name="destination_bad" value="<?php echo $par_destination_bad ?>">
	<?php  foreach($par_dest as $cle=>$val){ ?>
		<input type="HIDDEN" name="dest<?php echo $cle?>" value="<?php echo $val ?>">
	<?php  } ?>
	<input type="HIDDEN" name="source" value="<?php echo $_SESSION["s_source"] ?>">
	<input type="HIDDEN" name="campaign_id" value="<?php echo $_SESSION["s_campaign_id"] ?>">
	<input type="HIDDEN" name="sending_id" value="<?php echo $_SESSION["s_sending_id"] ?>">
	<input type="HIDDEN" name="base_id" value="<?php echo $_SESSION["s_base_id"] ?>">
	<input type="HIDDEN" name="contact_id" value="<?php echo $_SESSION["s_contact_id"] ?>">
	<input type="HIDDEN" name="qualif24" value="<?php echo $_SESSION["s_qualif24"] ?>">
	<?php foreach($hidden_fields as $k=>$v){ ?>
		<input type="HIDDEN" name="<?php echo $v ?>" value="<?php echo $_SESSION["s_".$v] ?>">
	<?php } ?>
	<input type="HIDDEN" name="caller" value="<?php echo $caller?>"><?php /* recuperer le valeur de la page pour le champ oblig $mandatory_fields */ ?>
	<?php if ($cond_sms_oblig_mobile === true) { //CHAMPS CONDITIONNELS Case à cocher SMS true alors N° PORTABLE (MOBILE) oblig ?>
	<input type="HIDDEN" name="mandatoryOblig_conditionel" id="mandatoryOblig_conditionel" value="1">
	<?php } ?>

<!-- Fin Paramètres de formulaire -->

<!-- ZONE OFFRE -->

	<?php include("landing_page.inc"); ?>

<!-- FIN ZONE OFFRE -->

</form>

</div>

<?php
if($add_slider===true){
	include $slider_url_footer;
}
if($add_fancybox===true){
	//ajouter class="fancybox-media" sur le lien pour ouvrir en popup
	//ajouter class="various" sur le lien pour ouvrir en popup (mode iframe)
	include $fancybox_url_footer;
}
?>

<?php /* Vérification du champ e-mail */ ?>
<script src="js/mailcheck_custom.js"></script>

<?php /* CHAMPS CONDITIONNELS */ ?>
<?php
	/*
	 * CHAMPS CONDITIONNELS Case à cocher SMS true alors N° PORTABLE (MOBILE) oblig
	 */
	if ($cond_sms_oblig_mobile === true) {
?>
<script src="js/cond_sms_oblig_mobile.js"></script>
<?php } ?>



<?php
	/*
	 * CHAMPS CONDITIONNELS phone oblig
	 */
	if ($cond_phone_oblig===true) {
?>
<script src="js/cond_phone_oblig.js"></script>
<?php } ?>



<?php /* fin CHAMPS CONDITIONNELS */ ?>


<?php /* Cible IE inférieur ou égal à 9 - alternative au placeholder */ ?>
<!--[if lte IE 9]>
<script src="../include/polyfill/js/placeholder.polyfill.js"></script>
<![endif]-->
</body>
</html>
<?php ob_end_flush(); ?>
