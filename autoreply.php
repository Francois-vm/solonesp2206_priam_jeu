<?php
/*
 * TemplateName: standard_solo_GLOBAL
 *
 * Structure non responsive & pas de traduction auto
 *
 * @version: 1.1 - 03/2018
 */

/*FIX2009-11-26*/ include_once('/home/verticalmail/includes.php');

$par_langue = 'fr_FR'; //langue de la page fr_FR, en_EN, es_ES

include_once("parametres.inc");
include("../include/php_headers.inc");
include("../include/scripts_solo_global.inc"); //script pour la reecriture des liens et caracteres speciaux sauf < (&lt;) > (&gt;) "(&quot;) et & (&amp;) @ #
ob_start("rewrite_pages_mnemonique"); //reecriture des caracteres speciaux mais pas des liens
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
	<title>~ Bienvenue dans l'univers Nespresso</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta property="og:title" content="Nespresso" />
	<meta name="format-detection" content="telephone=no">
	<meta name="format-detection" content="date=no">
	<meta name="format-detection" content="address=no">
	<meta name="format-detection" content="email=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

	<style type="text/css">
		.lienmention {
			color: #8D8D8D;
		}

		/* Forcer l'alignement du message dans hotmail */
		.ExternalClass {
			width: 100%;
		}

		/* Pour eviter les changement de taille de texte sur mobile */
		body {
			-webkit-text-size-adjust: none;
			-ms-text-size-adjust: none;
		}

		/* Pour supprimer les bordure sur les tableaux */
		table td {
			border-collaspse: collapse;
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			margin: 0;
			padding: 0;
		}

		img {
			margin: 0;
			padding: 0;
		}

		@media only screen and (max-width: 3000px),
		(max-device-width: 3000px) {
			*[class~=general] {
				width: 700px !important;
			}
		}

		@media only screen and (max-width: 639px),
		(max-device-width: 639px) {
			*[class~=general] {
				width: 320px !important;
			}
		}

		/* Chargement des Fonts Nespresso */
		@media screen {
				@font-face {
					font-family: 'Nespresso Lucas';
					src: url('https://www.perf-b2c.com/<?= $par_operation; ?>/fonts/regular/NespressoLucas-Regular.woff') format('woff'),
						url('https://www.perf-b2c.com/<?= $par_operation; ?>/fonts/regular/NespressoLucas-Regular.svg') format('svg'),
						url('https://www.perf-b2c.com/<?= $par_operation; ?>/fonts/regular/NespressoLucas-Regular.eot') format('embedded-opentype'),
						url('https://www.perf-b2c.com/<?= $par_operation; ?>/fonts/regular/NespressoLucas-Regular.ttf') format('ttf');
					font-weight: normal;
					font-style: normal
				}

				@font-face {
					font-family: 'Nespresso Lucas Light';
					src: url('https://www.perf-b2c.com/<?= $par_operation; ?>/fonts/light/NespressoLucas-Light.woff') format('woff'),
						url('https://www.perf-b2c.com/<?= $par_operation; ?>/fonts/light/NespressoLucas-Light.svg') format('svg'),
						url('https://www.perf-b2c.com/<?= $par_operation; ?>/fonts/light/NespressoLucas-Light.eot') format('embedded-opentype'),
						url('https://www.perf-b2c.com/<?= $par_operation; ?>/fonts/light/NespressoLucas-Light.ttf') format('ttf');
					font-weight: normal;
					font-style: normal
				}

				@font-face {
					font-family: 'Nespresso Lucas XtraBd';
					src: url('https://www.perf-b2c.com/<?= $par_operation; ?>/fonts/xtrabd/NespressoLucas-XtraBd.woff') format('woff'),
						url('https://www.perf-b2c.com/<?= $par_operation; ?>/fonts/xtrabd/NespressoLucas-XtraBd.svg') format('svg'),
						url('https://www.perf-b2c.com/<?= $par_operation; ?>/fonts/xtrabd/NespressoLucas-XtraBd.eot') format('embedded-opentype'),
						url('https://www.perf-b2c.com/<?= $par_operation; ?>/fonts/xtrabd/NespressoLucas-XtraBd.ttf') format('ttf');
					font-weight: normal;
					font-style: normal
				}
			}

		/* Pour &eacute;viter les changements de taille de texte sur mobile */
		body {
			font-family: 'Nespresso Lucas Light', Helvetica, Arial, sans-serif;
			background-color: #FFFFFF;
			margin: 0;
			padding: 0;
			-webkit-text-size-adjust: none;
			-ms-text-size-adjust: none;
		}

		/* Forcer l'alignement du message dans Hotmail */
		.ExternalClass {
			width: 100%;
		}

		/* Basics */
		.wrapper {
			width: 100%;
			table-layout: fixed;
			-webkit-text-size-adjust: 100%;
			-ms-text-size-adjust: 100%;
		}

		/* Conteneur Mail */
		*[class~=general],
		.general {
			width: 700px !important;
		}

		/* Cacher ou Afficher */
		/* *[class~=show_mobile],
        .show_mobile {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
        } */

		/* Logo */
		img[class=ml_logo],
		.ml_logo {
			width: 348px;
			display: block;
		}

		/* Bloc avec bordure */
		*[class~=title-fieldset],
		.title-fieldset {
			font-size: 28px !important;
			line-height: 36px !important;
		}

		@media only screen and (max-width: 700px),
		(max-device-width: 700px) {

			/* Conteneur Mail */
			*[class~=general],
			.general {
				width: 100% !important;
			}

			.tableau_bordure_gris {
				width: 90%;
			}

			/* Logo */
			img[class=ml_logo],
			.ml_logo {
				width: 50%;
				min-width: 200px;
			}

			/* R&eacute;seaux Sociaux */
			img[class=social],
			.social {
				width: 60px;
				height: 60px;
				display: block;
			}

			/* Bloc avec bordure */
			*[class~=title-fieldset],
			.title-fieldset {
				font-size: 22px !important;
				line-height: 23px !important;
			}

			/* Changer la taille de la typo (ne fonctionne pas sous APP Gmail Android) */
			*[class~=f22],
			.f22 {
				font-size: 22px !important;
				line-height: 28px !important;
			}

			*[class~=f54],
			.f54 {
				font-size: 54px !important;
				line-height: 62px !important;
			}

			/* Modifier la hauteur de fa&ccedil;on non homoth&eacute;tique */
			*[class~=h30],
			.h30 {
				height: 30px !important;
				line-height: 30px !important;
			}

			*[class~=h20],
			.h20 {
				height: 20px !important;
				line-height: 20px !important;
			}

			/* Cacher ou Afficher */
			*[class~=delete_mobile],
			.delete_mobile {
				display: none !important;
				width: 0 !important;
				height: 0 !important;
			}

			*[class~=show_mobile],
			.show_mobile {
				display: block !important;
				width: 100% !important;
				height: auto !important;
			}

			*[class~=show_mobile],
			.show_mobile img {
				width: 75% !important;
				margin: auto !important;

			}

			*[class~=full_mobile],
			.full_mobile {
				width: 100% !important;
			}

			*[class~=w90pourc_mobile],
			.w90pourc_mobile {
				width: 90% !important;
			}

			*[class~=w50pourc_mobile],
			.w50pourc_mobile {
				width: 50% !important;
			}
		}
	</style>
	<!--[if (gte mso 9)|(IE)]>
        <style type="text/css">
            table { border-collapse:collapse; }
        </style>
    <![endif]-->

	<!--[if gte mso 9]>
        <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
    <![endif]-->
</head>

<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF" text="#000001" alink="#000001" vlink="#000001" link="#000001">
	<center>
		<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
			<tr>
				<td align="center" bgcolor="#FFFFFF">
					<!--[if (gte mso 9)|(IE)]>
			<table border="0" cellpadding="0" cellspacing="0" width="700" style="width:700px;" class="general"><tr><td align="left" valign="top">
			<![endif]-->
					<table cellspacing="0" cellpadding="0" border="0" style="width:100%; Max-Width:700px;" class="general">
                        <tr>
                            <td height="20" align="center" valign="middle"></td>
                        </tr>
						<tr>
							<td>
								<table width="100%" cellpadding="0" cellspacing="0" border="0" class="general">
									<tr>
                                        <td style="font-size: 12px; font-family:Nespresso Lucas Light, Arial, Helvetica, sans-serif;color:#000000"
                                        valign="middle" align="center">
                                        Laissez-vous tenter par notre gamme de caf&eacute;s d'exception - Consultez la
												<a href="autoreply.php" target="_blank" id="link-01">
													<font >version en&nbsp;ligne</font>
												</a>
											</font>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<!--[if (gte mso 9)|(IE)]>
			</td></tr></table>
			<![endif]-->
				</td>
			</tr>
		</table>
		<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" style="background-color:#FFFFFF;" class="wrapper">
			<tbody>
				<tr>
					<td align="center" valign="top" width="100%" bgcolor="#FFFFFF" style="background-color:#FFFFFF;">
						<!--[if (gte mso 9)|(IE)]><table border="0" cellpadding="0" cellspacing="0" width="700" style="width:700px;" class="general"><tbody><tr><td align="left" valign="top"><![endif]-->
						<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%; Max-Width:700px;" class="general">
							<tbody>
								<tr>
									<td height="35" style="height:35px; line-height:35px; font-size:1px;">&nbsp;</td>
								</tr>
                                <tr>
                                    <td align="center" valign="middle">
                                        <a href="link_autoresp_visu.php"
                                        target="_blank"><img src="visuals/logo.png" alt="Nespresso" width="60" height="60" class="" style="width:60px; height:60px"></a>
                                    </td>
                                </tr>
                                <?php
										/*
								<tr>
									<td height="25.16" style="height:25.16px; line-height:22px; font-size:1px;">&nbsp;</td>
								</tr>
								<tr>
									<td align="center"><img src="visuals/ml_bienvenue.jpg" alt="Nespresso" width="367" height="auto" class="ml_logo" /></td>
								</tr>*/ ?>
								<tr>
									<td height="25.16" style="height:25.16px; line-height:22px; font-size:1px;">&nbsp;</td>
								</tr>
								<tr>
									<td align="center">
										<a href="link_autoresp_visu.php" target="_blank"><img src="visuals/ml_bandeau.jpg" width="700" height="auto" class="resize320" style="display:block; border:0; width:100%; max-width:700px; height:auto;" alt="" /></a>
									</td>
								</tr>
                                <tr>
                                    <td height="35" align="center" valign="middle"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 36px; font-family:Nespresso Lucas XtraBd, Arial, Helvetica, sans-serif;color:#000000; letter-spacing: 2px;"
                                        valign="middle" align="center">
                                        BIENVENUE CHEZ NESPRESSO
                                    </td>
                                </tr>
								<tr>
									<td height="24.68" style="height:24.68px; line-height:22px; font-size:1px;">&nbsp;</td>
								</tr>
								<tr>
									<td align="center" style="font-size: 16px;font-family:Nespresso Lucas, Arial, Helvetica, sans-serif;color:#000000 ; padding-left:10px; padding-right:10px;"valign="middle" align="center"  class="f22">
										Bonjour
                                        <span style="color: #da308a;">
                                            <?php
                                            /* CHAMPS SPECIFIQUES - CODE KERNIX CIVILITE NOM */
                                            if ($mailer == "KERNIX") {
                                                echo "[[RULE:1]],";
                                            } else {
                                                if (($_SESSION["s_titre"] <> "") && ($_SESSION["s_nom"] <> "")) {
                                                    echo ($_SESSION["s_titre"] . " " . $_SESSION["s_nom"] . ",");
                                                } else {
                                                    echo $trad['formulaires']['intro_civilite']; //echo ("Madame, Monsieur,");
                                                }
                                            }
                                            ?>
                                        </span>
										<br /><br />
										Nespresso a &agrave; coeur de s'engager chaque jour en faveur des caf&eacute;iculteurs, du recyclage et du caf&eacute; de tr&egrave;s haute qualit&eacute;.
										<br /><br />
										Parce qu'avec chaque tasse, nous transformons le rituel du caf&eacute; en un engagement, d&eacute;couvrez les 50 ar&ocirc;mes authentiques de nos caf&eacute;s de qualit&eacute; durable d&egrave;s maintenant.
									</td>
								</tr>
                                <tr>
                                <td height="20" align="center" valign="middle"></td>
                            </tr>
                            <tr>
                                <td class="wid_cen" valign="middle" align="center">
                                    <table class="wid_cen" width="158" cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td style="font-size: 18px;letter-spacing:1px; font-family: Nespresso Lucas Light, Arial, Helvetica, sans-serif; color: #ffffff"
                                                valign="middle" height="39" bgcolor="#000000" align="center">
                                                <a href="link_autoresp_btn.php"
                                                   style="text-decoration:none;color:#ffffff" target="_blank">
                                                    J&rsquo;EN PROFITE</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="35" align="center" valign="middle"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 30px;font-family:Nespresso Lucas XtraBd, Arial, Helvetica, sans-serif;color:#000000" valign="middle" align="center">
                                    TRANSFORMEZ VOTRE RITUEL CAFÉ <br class="dn">
                                    EN UN ENGAGEMENT
                                </td>
                            </tr>
                            <tr>
                                <td height="20" style="height:20px; line-height:20px; font-size:1px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="center" class="show_mobile">
                                                    <a href="link_autoresp_pic1.php" target="_blank" style="border:0;"><img src="visuals/ml_avantages_1.jpg" alt="Un caf&eacute; de qualit&eacute; durable" width="334.1" height="auto" style="display: block;" class="show_mobile" /></a>
                                                </td>
                                                <td class="show_mobile" align="center" style="font-size: 16px; line-height: 22px; font-family: Nespresso Lucas Light, Arial, Helvetica, sans-serif; color:#000001; padding : 0 15px;" class="f22">
                                                    <span align="center" style="font-size: 22px; font-family: Nespresso Lucas XtraBd, Arial, Helvetica, sans-serif; color: #000000 " class="f22">
                                                    <table><tr><td height="5" colspan="3" style="height:5px; line-height:5px; font-size:1px;">&nbsp;</td></tr></table>
                                                        UN CAF&Eacute;<br />
                                                        DE QUALIT&Eacute; DURABLE
                                                    </span>
                                                    <br /><br />
                                                    Le caf&eacute; de haute qualit&eacute; est menac&eacute; de disparition &agrave; cause du changement climatique.<br />
                                                    Depuis 2003, Nespresso a lanc&eacute; le programme AAA pour une Qualit&eacute; Durable pour assurer sur le long terme son approvisionnement.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="26" style="height:26px; line-height:26px; font-size:1px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td class="show_mobile" align="center" style="font-size: 16px; line-height: 22px; font-family: Nespresso Lucas Light, Arial, Helvetica, sans-serif; color:#000001; padding : 0 15px;" class="f22">
                                                    <span align="center" style="font-size: 22px; font-family: Nespresso Lucas XtraBd, Arial, Helvetica, sans-serif; color: #000000 " class="f22">
                                                        L'ACCOMPAGNEMENT<br />
                                                        DES CAF&Eacute;ICULTEURS
                                                    </span><br /><br />
                                                    Nos agronomes accompagnent les caf&eacute;iculteurs sur le terrain et Nespresso ach&egrave;te le caf&eacute; 30 &agrave; 40% au-dessus des prix du march&eacute; pour p&eacute;renniser la culture du caf&eacute; de haute qualit&eacute; et am&eacute;liorer les conditions de vie des caf&eacute;iculteurs.<br /><br />
                                                </td>
                                                <td class="show_mobile" align="center">
                                                    <a href="link_autoresp_pic2.php" target="_blank" style="border:0;"><img src="visuals/ml_avantages_2.jpg" alt="L'accompagnent des caf&eacute;iculteurs" width="334.1" height="auto" style="display: block;" class="show_mobile" /></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="26.86" style="height:26.86px; line-height:26.86px; font-size:1px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td class="show_mobile" align="center">
                                                    <a href="link_autoresp_pic3.php" target="_blank" style="border:0;"><img src="visuals/ml_avantages_3.jpg" alt="Notre choix de l'aluminium" width="334.1" height="auto" style="display: block;" class="show_mobile" /></a>
                                                </td>
                                                <td class="show_mobile" align="center" style="font-size: 16px; line-height: 22px; font-family: Nespresso Lucas Light, Arial, Helvetica, sans-serif; color:#000001; padding : 0 15px;" class="f22">
                                                    <span align="center" style="font-size: 22px; font-family: Nespresso Lucas XtraBd, Arial, Helvetica, sans-serif; color: #000000 " class="f22">
                                                        NOTRE CHOIX<br />
                                                        DE L'ALUMINIUM
                                                    </span><br /><br />
                                                    L'aluminium de nos capsules est 100% recyclable. Nous l'avons choisi car il est le meilleur mat&eacute;riau connu pour pr&eacute;server la qualit&eacute; et la fra&icirc;cheur du caf&eacute; sur une longue p&eacute;riode. Nous agissons pour que nos capsules soient issues &agrave; 80% d'aluminium recycl&eacute; d'ici fin 2021.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="34.54" style="height:34.54px; line-height:34.54px; font-size:1px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif; font-size:22px; color:#000001; padding-left:10px; padding-right:10px; line-height: 26px" >
                                    Tous nos engagements sur Nespresso.com/Agit
                                </td>
                            </tr>
                            <tr>
                                <td style="height:29px; line-height:29px; font-size:1px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="" align="center">
                                    <a href="link_ml_whatelse.php" target="_blank"><img src="visuals/whatelse.png" alt="" style="display: block;max-width:184px;margin: auto;" class="" /></a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <table style="max-width:640px;" width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td style="height:29px; line-height:29px; font-size:1px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="height:1px; line-height:1px; font-size:1px; background-color:#e3e3e3;" bgcolor="#e3e3e3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="height:21px; line-height:21px; font-size:1px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="machine" align="center" valign="top" style="width:40%">
                                                                    <a href="link_ml_compte.php" target="_blank"><img src="visuals/club.png" alt="" style="display: block;max-width:320px;margin: auto; height:auto;" class="club" /></a>
                                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" style="padding : 0 45px; font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif; font-size: 11px;font-weight: 300;font-stretch: normal;font-style: normal;line-height: 1.59;letter-spacing: 1.1px;text-align: left;color:#000001;">
                                                                        <tr>
                                                                            <td height="15" style="height:15px; line-height:1px; font-size:1px;">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="text-align: center;">Rejoignez le Club Nespresso et bénéficiez tout au long de l'année d'avantages exclusifs</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="15" style="height:15px; line-height:1px; font-size:1px;">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fcenter center"><a href="link_ml_compte.php" target="_blank">Se créer un compte.</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="15" style="height:15px; line-height:1px; font-size:1px;">&nbsp;</td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td valign="top" class="machine" align="center" style=" border-left : 1px solid #e3e3e3; font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif;color:#000001; font-size: 14.5px;font-weight: 300;font-stretch: normal;font-style: normal;line-height: 1.1;letter-spacing: 1.45px;text-align: center;width: 60%;">
                                                                    Les avantages du Club Nespresso
                                                                    <table cellpadding="0" cellspacing="0" border="0" align="center">
                                                                        <tr>
                                                                            <td style="height:26px; line-height:26px; font-size:1px;">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="left">
                                                                                <!--[if (gte mso 9)|(IE)]>
                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>
                                                                                    <tr>
                                                                                        <td align="left" valign="top">
                                                                                <![endif]-->
                                                                                <table style="width:105px; border: 0;" align="left" cellpadding="0" cellspacing="0" border="0" class="w320">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td width="60" align="center" style="width:60px; font-family:Arial, Helvetica, sans-serif; font-size:14px;" class="w280">
                                                                                                <a href="link_ml_livraison_gratuite.php" target="_blank"><img src="visuals/camion.png" alt="Nespresso" style="max-width:60px;"></a>
                                                                                            </td>
                                                                                            <tr>
                                                                                                <td style="height:15px; line-height:15px; font-size:1px;">&nbsp;</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td height="20" colspan="3" style="font-size: 9.5px; font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif;font-weight: 300;font-stretch: normal;font-style: normal;line-height: 1.68;letter-spacing: 0.95px;text-align: center;">Livraison offerte<br />
                                                                                                tout au long de<br />l'année</td>
                                                                                            </tr>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <!--[if (gte mso 9)|(IE)]>
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                <![endif]-->
                                                                                <table style="width:105px; border: 0;" align="left" cellpadding="0" cellspacing="0" border="0" class="w320">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td width="60" align="center" style="width:60px; font-family:Arial, Helvetica, sans-serif; font-size:14px;" class="w280">
                                                                                                <a href="link_ml_surprise.php" target="_blank"><img src="visuals/cadeau.png" alt="Nespresso" style="max-width:60px;"></a>
                                                                                            </td>
                                                                                            <tr>
                                                                                                <td style="height:6px; line-height:6px; font-size:1px;">&nbsp;</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td height="20" colspan="3" style="font-size: 9.5px; font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif;font-weight: 300;font-stretch: normal;font-style: normal;line-height: 1.68;letter-spacing: 0.95px;text-align: center;">Une surprise pour<br />votre anniversaire<br />Nespresso</td>
                                                                                            </tr>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <!--[if (gte mso 9)|(IE)]>
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                <![endif]-->
                                                                                <table style="width:105px; border: 0;" align="left" cellpadding="0" cellspacing="0" border="0" class="w320">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td width="60" align="center">
                                                                                                <a href="link_ml_degustation_offerte.php" target="_blank"><img src="visuals/tasse.png" style="max-width:60px;" alt="Nespresso"></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="height:15px; line-height:15px; font-size:1px;">&nbsp;</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td height="20" colspan="3" style="font-size: 9.5px; font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif;font-weight: 300;font-stretch: normal;font-style: normal;line-height: 1.68;letter-spacing: 0.95px;text-align: center;">Dégustation<br />offerte en<br />Boutique</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <!--[if (gte mso 9)|(IE)]>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody></table>
                                                                                <![endif]-->
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height:29px; line-height:29px; font-size:1px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="height:1px; line-height:1px; font-size:1px; background-color:#e3e3e3;" bgcolor="#e3e3e3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="height:21px; line-height:21px; font-size:1px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="" align="center" valign="top" style="width: 60%;">
                                                                    <table cellpadding="0" cellspacing="0" border="0" align="right" class="full_mobile fcenter center" style="font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif; font-size: 14.5px;font-weight: 300;font-stretch: normal;font-style: normal;line-height: 1.1;letter-spacing: 1.45px;text-align: left;color:#000001;">
                                                                        <tr>
                                                                            <td height="15" style="height:15px; line-height:1px; font-size:1px;">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Rejoignez nous sur #Nespressomoments</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="15" style="height:15px; line-height:1px; font-size:1px;">&nbsp;</td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td class="" align="center" valign="bottom">
                                                                    <table cellpadding="0" cellspacing="0" border="0" align="center">
                                                                        <tr>
                                                                            <td align="left">
                                                                                <!--[if (gte mso 9)|(IE)]>
                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>
                                                                                    <tr>
                                                                                        <td align="left" valign="top">
                                                                                <![endif]-->
                                                                                <table style="width:40px; border: 0;" align="left" cellpadding="0" cellspacing="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td align="center">
                                                                                                <a href="link_ml_ig.php" target="_blank"><img src="visuals/insta.png" alt="Nespresso"></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="height:15px; line-height:15px; font-size:1px;">&nbsp;</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <!--[if (gte mso 9)|(IE)]>
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                <![endif]-->
                                                                                <table style="width:40px; border: 0;" align="left" cellpadding="0" cellspacing="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td align="center">
                                                                                                <a href="link_ml_fb.php" target="_blank"><img src="visuals/fb.png" alt="Nespresso"></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="height:6px; line-height:6px; font-size:1px;">&nbsp;</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <!--[if (gte mso 9)|(IE)]>
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                <![endif]-->
                                                                                <table style="width:40px; border: 0;" align="left" cellpadding="0" cellspacing="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td align="center" >
                                                                                                <a href="link_ml_tw.php" target="_blank"><img src="visuals/twitter.png" alt="Nespresso"></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="height:15px; line-height:15px; font-size:1px;">&nbsp;</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <!--[if (gte mso 9)|(IE)]>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody></table>
                                                                                <![endif]-->
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height:29px; line-height:29px; font-size:1px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="height:1px; line-height:1px; font-size:1px; background-color:#e3e3e3;" bgcolor="#e3e3e3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="height:21px; line-height:21px; font-size:1px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <!--[if (gte mso 9)|(IE)]>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                    <![endif]-->
                                                    <table style="width:320px;" align="left" cellpadding="0" cellspacing="0" border="0" class="full_mobile"><tbody>
                                                        <tr><td height="20" colspan="2" style="height:20px; line-height:20px;"><img src="visuals/blank.gif" width="1" height="1" style="display:block; border:0;" alt=""></td></tr>
                                                        <tr>
                                                            <td width="30" style="width:30px;"><img src="visuals/blank.gif" width="1" height="1" style="display:block; border:0;" alt=""></td>
                                                            <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;">
                                                                <!--[if (gte mso 9)|(IE)]>
                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>
                                                                    <tr>
                                                                        <td align="left" valign="top">
                                                                <![endif]-->
                                                                <table width="50%" style="width:50%; border:0;" align="left" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;">
                                                                                <a href="link_ml_livraison_gratuite.php" target="_blank"><img src="visuals/camion.png" alt="Nespresso" style="max-width:100px;"></a>
                                                                            </td>
                                                                        <tr>
                                                                            <td style="height:15px; line-height:15px; font-size:1px;">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="font-size: 9.5px; font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif;font-weight: 300;font-stretch: normal;font-style: normal;line-height: 1.68;letter-spacing: 0.95px;text-align: center;">
                                                                                Livraison offerte<br />
                                                                                tout au long de<br />
                                                                                l'année<sup>(1)</sup>
                                                                            </td>
                                                                        </tr>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--[if (gte mso 9)|(IE)]>
                                                                </td>
                                                                <td align="left" valign="top">
                                                                <![endif]-->
                                                                <table width="50%" style="width:50%; border: 0;" align="left" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;">
                                                                                <a href="link_ml_boutiques.php" target="_blank"><img src="visuals/pin.png" alt="Nespresso" style="max-width:100px;"></a>
                                                                            </td>
                                                                        <tr>
                                                                            <td style="height:6px; line-height:6px; font-size:1px;">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="font-size: 9.5px; font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif;font-weight: 300;font-stretch: normal;font-style: normal;line-height: 1.68;letter-spacing: 0.95px;text-align: center;">
                                                                            Vivez l'expérience<br />
                                                                            Nespresso en<br />
                                                                            Boutique
                                                                            </td>
                                                                        </tr>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--[if (gte mso 9)|(IE)]>
                                                                        </td>
                                                                    </tr>
                                                                </tbody></table>
                                                                <![endif]-->
                                                            </td>
                                                            <td width="30" style="width:30px;"><img src="visuals/blank.gif" width="1" height="1" style="display:block; border:0;" alt=""></td>
                                                        </tr>
                                                    </tbody></table>
                                                    <!--[if (gte mso 9)|(IE)]>
                                                            </td>
                                                            <td align="left" valign="top">
                                                    <![endif]-->
                                                    <table style="width:320px;" align="left" cellpadding="0" cellspacing="0" class="full_mobile"><tbody>
                                                        <tr><td height="20" colspan="2" style="height:20px; line-height:20px;"><img src="visuals/blank.gif" width="1" height="1" style="display:block; border:0;" alt=""></td></tr>
                                                        <tr>
                                                            <td width="30" style="width:30px;"><img src="visuals/blank.gif" width="1" height="1" style="display:block; border:0;" alt=""></td>
                                                            <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;">
                                                            <!--[if (gte mso 9)|(IE)]>
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody>
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                            <![endif]-->
                                                            <table width="50%" style="width:50%; border: 0;" align="left" cellpadding="0" cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                            <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;">
                                                                            <a href="link_ml_capsules.php" target="_blank"><img src="visuals/recycling.png" alt="Nespresso" style="max-width:100px;"></a>
                                                                        </td>
                                                                        <tr>
                                                                            <td style="height:6px; line-height:6px; font-size:1px;">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="font-size: 9.5px; font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif;font-weight: 300;font-stretch: normal;font-style: normal;line-height: 1.68;letter-spacing: 0.95px;text-align: center;">
                                                                            Donnez une<br />
                                                                            seconde vie à vos<br />
                                                                            capsules !
                                                                            </td>
                                                                        </tr>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!--[if (gte mso 9)|(IE)]>
                                                            </td>
                                                            <td align="left" valign="top">
                                                            <![endif]-->
                                                            <table width="50%" style="width:50%; border: 0;" align="left" cellpadding="0" cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;">
                                                                        <a href="link_ml_programme_cafe.php" target="_blank"><img src="visuals/boutique.png" style="max-width:100px;" alt="Nespresso"></a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="height:10px; line-height:10px; font-size:1px;">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-size: 9.5px; font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif;font-weight: 300;font-stretch: normal;font-style: normal;line-height: 1.68;letter-spacing: 0.95px;text-align: center;">
                                                                        Enregistrez vos cafés<br />préférés et recevez-les<br />automatiquement
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!--[if (gte mso 9)|(IE)]>
                                                                    </td>
                                                                </tr>
                                                            </tbody></table>
                                                            <![endif]-->
                                                            </td>
                                                            <td width="30" style="width:30px;"><img src="visuals/blank.gif" width="1" height="1" style="display:block; border:0;" alt=""></td>
                                                        </tr>
                                                    </tbody></table>
                                                    <!--[if (gte mso 9)|(IE)]>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                                    <![endif]-->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height:29px; line-height:29px; font-size:1px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="height:1px; line-height:1px; font-size:1px; background-color:#e3e3e3;" bgcolor="#e3e3e3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="height:21px; line-height:21px; font-size:1px;">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if (gte mso 9)|(IE)]></td></tr></tbody></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>




		<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
			<tr>
				<td align="center" bgcolor="#FFFFFF">

					<!--[if (gte mso 9)|(IE)]>
			<table border="0" cellpadding="0" cellspacing="0" width="700" style="width:700px;" class="general"><tr><td align="left" valign="top">
			<![endif]-->

					<table cellspacing="0" cellpadding="0" border="0" style="width:100%; Max-Width:700px;" class="general">
						<tr>
							<td>
						<tr>
							<td align="center" style="padding-left:20px; padding-right:20px;line-height: 18px; font-size: 10px;font-family:Nespresso Lucas, Arial, Helvetica, sans-serif;color:#1e2326">
								Visuels non contractuels.<br />
								Suggestion de présentation.<br />
								<br><br>
								(1) Livraison gratuite en France m&eacute;tropolitaine et Monaco avec
                                Colissimo, en Point Relais (hors livraison avec Chronopost, <br class="dn"/> Chronorelais, Coursier 24h, et Nespresso Your Time) pour tout achat d'accessoires, de machines ou d&egrave;s 50 capsules <br class="dn"/>command&eacute;es de la gamme Original ou d&egrave;s 30 capsules de la gamme Vertuo command&eacute;es sur le site internet <a href="link_autoresp_mention_site.php" style="color: #1e2326; text-decoration: none" target="_blank">Nespresso.com</a>, <br class="dn"/>depuis l'application mobile Nespresso, ou par t&eacute;l&eacute;phone au 0 800 55 52 53 (appel et service gratuits, disponibles du lundi au <br class="dn"/>samedi de  8h &agrave; 20h, hors 1<sup>er</sup> mai et jours f&eacute;ri&eacute;s).
								<br /><br />
								Vous recevez cet email car vous êtes désormais abonné aux communications Nespresso.
								Si vous ne souhaitez plus recevoir de messages de la part de Nespresso, veuillez <a href="link_autoresp_desabo.php" target="_blank">cliquer ici</a>.<br /><br />
								Si vous désirez contacter Nespresso, appelez le 0 800 55 52 53 - Service & appel gratuits (disponibles tous les jours de 7h à 22h, sauf le 1er mai).
								Conformément à la réglementation en vigueur, vous disposez d'un droit d'accès à vos données pour leur rectification, limitation, portabilité ou effacement en adressant un courrier à ISOSKELE, 17 rue de la Vanne, 92120 MONTROUGE ou un courriel à : <a href="mailto:droits-b2c@vertical-mail.com">droits-b2c@vertical-mail.com</a>.
								En cas de réclamation non résolue directement avec notre société, vous pouvez vous adresser à la CNIL, en <a href="link_autoresp_cnil.php" target="_blank">cliquant ici</a>.
							</td>
						</tr>
						<tr>
							<td height="20" style="height:20px; line-height:20px; font-size:1px;">&nbsp;</td>
						</tr>
					</table>

					<!--[if (gte mso 9)|(IE)]>
			</td></tr></table>
			<![endif]-->
				</td>
			</tr>
		</table>

	</center>

    <img src="https://www.google-analytics.com/collect?v=1&t=event&ni=1&tid=UA-77240692-54&cid=[CLUBMEMBERID]&ec=User%20Engagement&ea=User%20Open%20Email&el=Opened%20Email%20[CLUBMEMBERID]&cm=EM&cs=Email&dt=%2Femail&dl=%2Femail&cn=NET&ci=1d8c0f9b-ea35-4c03-8d8e-50060f5e9197&cm29=1&cd27=[CLUBMEMBERID]&cd22=B2C&cd19=FR&cd62=B2C&cd63=LOC&cd65=Avec-code"/>

</body>

</html>
<?php ob_end_flush(); ?>
