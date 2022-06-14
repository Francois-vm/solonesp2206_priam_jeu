<?php
/*
 * TemplateName: standard_solo_GLOBAL
 *
 * @version: 1.2 - 10/2017
 *
 * MODELE POUR HTML LIVRER PAR LE CLIENT
 * /!\ ne pas oublier de renommer le fichier mail_client.php par mail.php
 */

/*FIX2009-11-26*/ include_once('/home/verticalmail/includes.php');

$par_langue = 'fr_FR'; //langue de la page fr_FR, en_EN, es_ES

include_once("parametres.inc");
//include("../include/scripts_solo_new.inc");//script pour la reecriture des liens old
include("../include/scripts_solo_global.inc"); //script pour la reecriture des liens et caracteres speciaux sauf < (&lt;) > (&gt;) "(&quot;) et & (&amp;) @ #
include("../include/php_headers.inc");
include("../include/mentions2.inc");
ob_start("rewrite_pages"); //reecriture des liens auto entre "OFFRE" et "FIN OFFRE" + caracteres speciaux
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>
		<title>~ Et si Nespresso vous offrait une machine Vertuo et 100 capsules</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta property="og:title" content="Nespresso">
		<meta property="og:description" content="~ Grand jeu Nespresso Vertuo & Barista ">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

		<!--[if !mso]><!-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--<![endif]-->

		<meta name="format-detection" content="telephone=no">
		<meta name="format-detection" content="date=no">
		<meta name="format-detection" content="address=no">
		<meta name="format-detection" content="email=no">

		<style type="text/css" media="all">

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

			/* Pour éviter les changements de taille de texte sur mobile */
			body {
				font-family: Lucas, Helvetica, Arial, sans-serif;
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

			/* Cacher ou Afficher
			*[class~=show_mobile],
			.show_mobile {

				text-align: center !important;
			}*/

			/* bullet point*/
			*[class~=bullet],
			.bullet {

				padding-left: 22px !important;
			}

			/* Logo */
			img[class=ml_logo],
			.ml_logo {
				/* width:348px; */
				display: block;
			}

			/* Bloc avec bordure */
			*[class~=title-fieldset],
			.title-fieldset {
				font-size: 30px !important;
				line-height: 36px !important;
			}

			@media only screen and (max-width: 700px),
			(max-device-width: 700px) {

				/* Conteneur Mail */
				*[class~=general],
				.general {
					width: 100% !important;
				}

				*[class~=show_mobile],
				.show_mobile {
					padding: 0 !important;
					text-align: center !important;
				}

				*[class~=bullet],
				.bullet {

				padding-left: 0 !important;
				}

				*[class~=full_mobile],
				.full_mobile {
					width: 100% !important;
				}

				/* Logo */
				img[class=ml_logo],
				.ml_logo {
					width: 50%;
					min-width: 200px;
				}

				/* Réseaux Sociaux */
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
					line-height: 28px !important;
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

				/* Modifier la hauteur de façon non homothétique */
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
					padding: 0 !important;
				}

				*[class~=club],
				.club {
					display: block !important;
					height: auto !important;
					padding: 0 !important;
				}

				*[class~=large_mobile],
				.large_mobile {
					display: block !important;
					width: 100% !important;
					height: auto !important;
				}

				*[class~=large_mobile],
				.large_mobile img {
					width: 90% !important;
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

				*[class~=fcenter],
				.fcenter {
					text-align: center !important;
					margin: auto !important;
				}

				*[class~=center],
				.center {
					margin: 0 auto !important;
					text-align: center !important;
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
	<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF" text="#000001" alink="#000001" vlink="#000001" link="#000001" style="background-color:#FFFFFF;">
		<!--OFFRE-->
		<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" style="background-color:#FFFFFF;" class="wrapper">
			<tbody>
				<tr>
					<td align="center" valign="top" width="100%" bgcolor="#FFFFFF" style="background-color:#FFFFFF;">
						<!--[if (gte mso 9)|(IE)]><table border="0" cellpadding="0" cellspacing="0" width="700" style="width:700px;" class="general"><tbody><tr><td align="left" valign="top"><![endif]-->
						<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%; Max-Width:700px;" class="general">
							<tbody>
								<tr>
									<td height="20" style="height:20px; line-height:20px; font-size:1px;">&nbsp;</td>
								</tr>
								<tr>
									<td align="center">
										<span style="font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif; font-size:12px; color:#8D8D8D;">Nespresso vous offre la machine Vertuo et les indispensables du Barista - <a href="link_mirror.php" target="_blank" title="Découvrez de nouvelles saveurs avec un café responsable - Version en ligne" style="text-decoration:underline; color:#8D8D8D;"><strong>Version en ligne</strong>
											</a>
										</span>
									</td>
								</tr>
								<tr>
									<td height="35" style="height:35px; line-height:35px; font-size:1px;">
										<a href="link_pixctl.php"><img src="https://www.perf-b2c.com/visuals/blank.gif" width="1" height="1" style="display:block; border:0" alt=" " /></a>
									</td>
								</tr>
								<tr>
									<td align="center"><img src="visuals/logo.png" alt="Nespresso" width="60" height="60" class="" style="width:60px; height:60px"></td>
								</tr>
								<tr>
									<td height="32" style="height:32px; line-height:32px; font-size:1px;" class="h20">&nbsp;</td>
								</tr>
								<tr>
									<td valign="middle" align="center" style="font-size: 15px; font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif; text-align: center; letter-spacing: 1.5px; line-height: 15px; padding: 15px; background-color:#000001; color:#ffffff;">Jeu réservé exclusivement aux nouveaux clients</td>
								</tr>
								<tr>
									<td height="31" style="height:31px; line-height:31px; font-size:1px;" class="h20">&nbsp;</td>
								</tr>
								<tr>
									<td valign="middle" align="center" style="font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif;color:#19171a;font-size: 30px;">
									JOUEZ ET TENTEZ DE GAGNER UN COFFRET<br />
									<span style="font-family: 'Nespresso Lucas XtraBd', 'Nespresso Lucas', Helvetica, Arial, sans-serif;  font-size: 35px;font-weight: bold;line-height: 0.74;letter-spacing: -1.05px; line-height: 1.4;">VERTUO & LES INDISPENSABLES DU BARISTA<sup style="font-size: medium; vertical-align:top;">(1)</sup></span>
									</td>
								</tr>
								<tr>
									<td height="34" style="height:34px; line-height:34px; font-size:1px;" class="h20">&nbsp;</td>
								</tr>
								<tr>
									<td>
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<!--[if (gte mso 9)|(IE)]>
												</td>
												<td align="left" valign="top">
										<![endif]-->
											<tbody>
												<tr>
													<td class="show_mobile" align="center">
														<img src="visuals/visuel1.png" alt="" style="display: block;max-width:350px;margin: auto; height:auto;" class="club" />
													</td>
													<td bgcolor="#f5eee6" class="show_mobile" align="center" style=" font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif;color:#000001;font-size: 19px; width: 352px;">
														<table  cellpadding="0" cellspacing="0" border="0" align="center"><tr><td style="height:15px; line-height:15px; font-size:1px;">&nbsp;</td></tr></table>
														Devenez un expert de la dégustation<br />
														de café en gagnant notre coffret<br />
														composé de :

														<table cellpadding="0" cellspacing="0" border="0" align="center">
															<tr>
																<td height="20" style="height:20px; line-height:1px; font-size:1px;">&nbsp;</td>
															</tr>
															<tr>
																<td align="left" style="padding-left:10px; padding-right:10px;" class="f16">
																<tr>
																	<td class="bullet" style="font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif; font-size:22px; line-height: 1.23;;color:#d39075; font-weight:bold;">1 machine Vertuo Next,</td>
																</tr>
																<tr>
																	<td class="bullet" style="font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif; font-size:22px; line-height: 1.23;color:#d39075; font-weight:bold;">1 mousseur à lait Aeroccino,</td>
																</tr>
																<tr>
																	<td class="bullet" style="font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif; font-size:22px; line-height: 1.23;color:#d39075; font-weight:bold;">2 mugs <span style="color: #000001;">&</span> 100 capsules</td>
																</tr>
																<tr><td height="15" style="height:15px; line-height:15px; font-size:1px;">&nbsp;</td></tr>
																<tr>
																	<td class="bullet" style="font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif; font-size:22px; line-height: 1.23;;color:#d39075;"><span style="color: #000001;">ou</span> l'une des remises de 5&euro;<sup style="font-size: medium;">(2)</sup></td>
																</tr>
																<tr><td height="15" style="height:15px; line-height:15px; font-size:1px;">&nbsp;</td></tr>
																</td>
															</tr>
															<tr>
																<td style="text-align:center; padding : 0 35px;font-size: 17px;font-weight: 300;line-height: 1.12;">
																	Inscrivez-vous pour participer<br />
																	et recevoir du contenu exclusif
																</td>
															</tr>
															<tr><td height="15" style="height:15px; line-height:15px; font-size:1px;">&nbsp;</td></tr>
															<tr>
																<td style="text-align:center; padding : 0 35px;font-size: 17px;font-weight: 300;line-height: 1.12;">
																	<?php
																	if ($mailer == "KERNIX") {
																		echo "[[DB:email]]";
																	} else {
																		echo ($_SESSION["s_email"]);
																	}
																	?></td>
															<tr>
																<td height="23" style="height:23px; line-height:23px; font-size:1px;">&nbsp;</td>
															</tr>
															<tr>
																<td align="center">
																	<table class="wid_cen" cellspacing="0" cellpadding="0" border="0" style="width:230px">
																	<tr>
																		<td align="center">
																			<table class="wid_cen" cellspacing="0" cellpadding="0" border="0" style="width:230px">
																				<tr>
																					<td style="text-align:center; background-color:#000000; font-size: 26px; font-family:'NespressoLucas Regular', 'Nespresso Lucas', Arial, Helvetica, sans-serif; color: #ffffff; height:50px" valign="middle">
																					<a href="link_lp_ctl.php" style="text-decoration:none;color:#ffffff" target="_blank">JE PARTICIPE<sup style="font-size:16px">(3)</sup></a></td>
																				</tr>
																			</table>
																		</td>
																	</tr>
																	<tr>
																		<td height="23" style="height:23px; line-height:1px; font-size:1px;">&nbsp;</td>
																	</tr>
																	</table>
																</td>
															</tr>
														</table>
														<!--[if (gte mso 9)|(IE)]>
															</td>
														</tr>
													</tbody></table>
													<![endif]-->
														<table cellpadding="0" cellspacing="0" border="0" align="center"><tr><td style="height:20px; line-height:20px; font-size:1px;">&nbsp;</td></tr></table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td height="29" style="height:29px; line-height:1px; font-size:1px;">&nbsp;</td>
								</tr>
								<tr>
									<td>
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tbody>
												<tr>
													<td valign="top" bgcolor="#f5eee6" class="show_mobile" align="center" style=" font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif; color:#000001;font-size: 27px;font-weight: 900;">
														<table  cellpadding="0" cellspacing="0" border="0" align="center"><tr><td style="height:42px; line-height:42px; font-size:1px;">&nbsp;</td></tr></table>
														<span style="color:#d39075;">Et si une seule machine<br />
														vous permettait<br />
														de créer 4 tailles<br />
														de tasse ?</span>
														<table cellpadding="0" cellspacing="0" border="0" align="center">
															<tr>
																<td height="20" style="height:20px; line-height:1px; font-size:1px;">&nbsp;</td>
															</tr>
															<tr>
																<td style="text-align:center; padding : 0 64px; font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300;line-height: 1.63;letter-spacing: -0.16px;color:#000001;">
																	Découvrez le dernier design Vertuo et sa technologie innovante, pour apprécier l'expérience Nespresso en 4 tailles de tasse, de l'espresso au&nbsp;mug.
																</td>
															</tr>
															<tr><td style="height:34px; line-height:34px; font-size:1px;">&nbsp;</td></tr>
														</table>
														<!-- <table cellpadding="0" cellspacing="0" border="0" align="center"></table> -->
													</td>
													<td class="show_mobile" align="center">
														<img src="visuals/anim-mail.gif" alt="" style="display: block;max-width:350px;margin: auto;" class="club" />
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td height="23" style="height:23px; line-height:1px; font-size:1px;">&nbsp;</td>
								</tr>
								<tr>
									<td align="center" style="font-size: 13px; font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif; text-align: center; padding: 0 20px;">
									(3) En validant votre inscription, vous consentez à recevoir les actualités et les offres promotionnelles de la Famille Nespresso par email.
									Famille Nespresso : Nespresso France SAS, Nestlé Nespresso SA, Nestlé France SAS.<br>
									Si vous ne souhaitez plus recevoir nos communications, vous pourrez à tout moment vous désabonner.<br><br />
									<span style="line-height: 0;">Si vous souhaitez participer sans vous abonner, cliquez <a href="link_lp_ctl2.php" target="_blank" style="color:#000001;">ici</a></span>
									</td>
								</tr>
								<tr>
									<td style="height:23px; line-height:23px; font-size:1px;">&nbsp;</td>
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
                                                                                    l'année
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
								<tr>
									<td>
										<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
											<tr>
												<td align="center" bgcolor="#FFFFFF">
													<!--[if (gte mso 9)|(IE)]>
													<table border="0" cellpadding="0" cellspacing="0" width="700" style="width:700px;" class="general"><tr><td align="left" valign="top">
													<![endif]-->
													<table cellspacing="0" cellpadding="0" border="0" style="width:100%; Max-Width:700px;" class="general">
														<tr>
															<td align="center" style="font-family:'NespressoLucas Regular', 'Nespresso Lucas', Helvetica, Arial, sans-serif; font-size:12px; line-height:18px; color:#8D8D8D; padding-left:18px; padding-right:18px;">
																Visuels non contractuels.<br />
																Suggestion de présentation.<br />
																*Quoi d'autre.<br>
																<br>
																(1) Coffret composé d'une machine à café Nespresso Vertuo Next, d'un Mousseur à lait Aeroccino, de 2 mugs Vertuo et 100 capsules Vertuo.<br />
																(2) Valable dès 50 capsules Nespresso commandées. Offre valable en France métropolitaine du 01/07/2022 au 31/12/2022 inclus, exclusivement sur le site internet www.nespresso.com, depuis l'application mobile Nespresso, par téléphone au par téléphone au
																0 800 55 52 53 (appel et service gratuits, disponibles du lundi au samedi de 8h à 20h, hors 1er mai et jours fériés), ou dans l'une de nos Boutiques Nespresso (selon jours d'ouverture de la Boutique). Bénéficiez d'une remise immédiate de 5&euro; sur le montant de
																votre commande de café dès 50 capsules de la gamme Original ou Vertuo achetées. Offre strictement nominative et non transférable, limitée à une (1) utilisation par nouveau client et non cumulable avec toute autre offre Nespresso ou Nestlé en cours.<br />
																<br />
																Livraison gratuite en France métropolitaine et Monaco avec Colissimo, en Point Relais (hors livraison avec Chronopost, Chronorelais, Coursier 24h, et Nespresso Your Time) pour tout achat d'accessoires, de machines ou dès 50 capsules commandées de la gamme Original ou dès 30 capsules de la gamme Vertuo commandées sur le site internet Nespresso.com, depuis l'application mobile Nespresso, ou par téléphone au 0 800 55 52 53 - Service & appel gratuits (disponibles du lundi au samedi de 8h à 20h et les dimanches et les jours fériés de 10h à 18h, tous les jours sauf le 1er mai).
																<?php if ($_lt != "hp") {
																	echo "<br /><br /><br />" . $par_abon;
																} ?>
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
									</td>
								</tr>
							</tbody>
						</table>
					<!--[if (gte mso 9)|(IE)]></td></tr></tbody></table><![endif]-->
					</td>
				</tr>
			</tbody>
		</table>
		<!--FIN OFFRE-->
	</body>
</html>
<?php ob_end_flush(); ?>
