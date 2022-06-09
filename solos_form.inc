<?php
/*
 * TemplateName: standard_solo_GLOBAL
 *
 * @version: 1.3 - 01/2018
 */

/*FIX2009-11-26*/ include_once('/home/verticalmail/includes.php');

//FORMULAIRE : champs + label en placeholder
?>
<!-- Formulaire -->
<?php
include("../include/finished.inc");
//affichage d'un message d'erreur si champs obligatoire non renseigné ou email mal formaté
$_SESSION["erreur_saisie"] = stripslashes($_SESSION["erreur_saisie"]);
if (isset($_SESSION["erreur_saisie"]) and $_SESSION["erreur_saisie"] != ""){
	if ($_SESSION["erreur_saisie"]==$texte_fin_operation){
		echo ("$texte_fin_operation");
	} else {
		echo ("$popuperror");
	}
}
?>
<div>
	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="form">

		
		<tr>
			<td>
				<label for="email">Veuillez confirmer votre e-mail ci-dessous :*</label>
			</td>
		</tr>
		<tr><td class="espace"><img src="visuals/blank.gif" width="1" height="1"></td></tr>
		
		<?php /* NOM */ ?>
		<tr>
			<td>
				<input type="text" name="nom" placeholder="<?php echo $trad['formulaires']['label_nom']; if(array_key_exists("nom",$mandatory_fields[$caller])){ echo "*"; } ?>" value="<?php echo $_SESSION["s_nom"]?>" size="18" class="formstyle<?php  if (isset($_SESSION["erreur_saisie"]) and $_SESSION["erreur_saisie"] != "" and $_SESSION["s_nom"] == "" and array_key_exists("nom",$mandatory_fields[$caller])){ echo "2"; } ?>">
			</td>
		</tr>
		<tr><td class="espace"><img src="visuals/blank.gif" width="1" height="1"></td></tr>

		<?php /* PRENOM */ ?>
		<tr>
			<td>
				<input type="text" name="prenom" placeholder="<?php echo $trad['formulaires']['label_prenom']; if(array_key_exists("prenom",$mandatory_fields[$caller])){ echo "*"; } ?>" value="<?php echo $_SESSION["s_prenom"]?>" size="18" class="formstyle<?php  if (isset($_SESSION["erreur_saisie"]) and $_SESSION["erreur_saisie"] != "" and $_SESSION["s_prenom"] == "" and array_key_exists("prenom",$mandatory_fields[$caller])){ echo "2"; } ?>">
			</td>
		</tr>
		<tr><td class="espace"><img src="visuals/blank.gif" width="1" height="1"></td></tr>
		
		<?php /* EMAIL */ ?>
		<tr>
			<td>
				<input type="text" name="email" placeholder="<?php echo $trad['formulaires']['label_email']; if(array_key_exists("email",$mandatory_fields[$caller])){ echo "*"; } ?>" value="<?php echo $_SESSION["s_email"]?>" size="18" class="formstyle<?php  if (isset($_SESSION["erreur_saisie"]) and $_SESSION["erreur_saisie"] != "" and $_SESSION["s_email"] == "" and array_key_exists("email",$mandatory_fields[$caller])){ echo "2"; } ?>">
				<div class="emailsuggestion" style="margin:0; display: none;">
					<?php echo $trad['formulaires']['label_email_suggestion']; ?> <a href="javascript:$('input[name=email]').val($('#emailsuggestion').html());$('.emailsuggestion').hide();" id="emailsuggestion"></a> ?
				</div>
			</td>
		</tr>
		<tr><td class="espace"><img src="visuals/blank.gif" width="1" height="1"></td></tr>


	</table>
</div>

<div class="col_clear">
	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="form">

		<tr><td class="espace"><img src="visuals/blank.gif" width="1" height="1"></td></tr>

		<?php /* BOUTON */ ?>
		<tr>
			<td style="text-align:center;">
				<?php /* <input type="image" name="pbSubmit" src="visuals/lp_good/lp_bt_envoyer.gif" onClick="10.php(this.form)" width="100" height="20" border="0" alt="<?php echo $trad['formulaires']['bt_valid']; ?>"> */?>
				<input type="submit" name="pbSubmit" value="Je valide" onClick="10.php(this.form)" class="bt_lp" />
			</td>
		</tr>
		<tr><td class="espace"><img src="visuals/blank.gif" width="1" height="1"></td></tr>

		<?php /* LEGENDE Texte obligatoire */ ?>
		<tr>
			<td class="txt_oblig">
				<?php echo $trad['formulaires']['legende_etoile']; ?>
			</td>
		</tr>

	</table>
</div>
<!-- Fin du formulaire --> <?php $_SESSION["erreur_saisie"] = ""; ?>
