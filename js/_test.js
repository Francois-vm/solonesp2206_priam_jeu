/*
 * CHAMPS CONDITIONNELS Case ‡ cocher SMS true alors N∞ PORTABLE (MOBILE) oblig
 */

//$(document).ready(function() {
$(function(){
	condition_TRUC();
});


function condition_TRUC() {
}





var Qualif="qualif2";
var Value="Oui";
var inputType="radio";// valeur possible radio ou checkbox

$(function(){

	$(":"+inputType).change(function()
            {

					 if($(this).val()==Value && $(this).attr("name")==Qualif && $(this).attr("checked")=="checked" ){

					$(".Champ_oblig_placeHolder").each(function(){
						  $(this).attr("placeholder",$(this).attr("placeholder")+"*");
						});

					 } else {

						 $(".Champ_oblig_placeHolder").each(function(){
						  $(this).attr("placeholder",$(this).attr("placeholder").replace("*",""));
						});

						 }

            });


				// initialisation


				if($(":"+inputType+"[name="+Qualif+"][value="+Value+"]").attr("checked")=="checked"){


					$(".Champ_oblig_placeHolder").each(function(){
						  $(this).attr("placeholder",$(this).attr("placeholder")+"*");
						});


				}  else if ($("[name='"+Qualif+"']").attr("checked")!="checked"){

					$(".Champ_oblig_placeHolder").each(function(){
						  $(this).attr("placeholder",$(this).attr("placeholder").replace("*",""));
						});



					}
					else {

						 $(".Champ_oblig_placeHolder").each(function(){
						  $(this).attr("placeholder",$(this).attr("placeholder").replace("*",""));
						});


					}

});

/*
<!--<form autocomplete="off">-->
<form>
<!--<input type="checkbox" id="qualif2_Oui" name="qualif2" value="Oui"  /><label>Oui</label>-->
<input type="radio" id="qualif2_Oui" name="qualif2" value="Oui"  /><label>Oui</label>
<input type="radio" id="qualif2_Non" name="qualif2" value="Non" /><label>Non</label>
<br>
<input type="text" name="qualif3" placeholder="Nom de l'accompagnant" class="Champ_oblig_placeHolder" style="width:205px;" />
<br>
<input type="text" name="qualif4" placeholder="E-mail de l'accompagnant" class="Champ_oblig_placeHolder" style="width:205px;" />
</form>
*/



// CLIENT SVP
$(document).ready(function() {
	/*init = function() {
	  question();
	}*/
	question();
});

/*
 * TYPE D'ENTREPRISE
 * #type - Qualif1
 *
 * SECTEUR D'ACTIVITES
 * #tr_secteur	#secteur - Qualif2
 *
 * EFFECTIFS
 * #tr_taille_col #taille_col - Qualif5 > 3
 * #tr_taille_ent #taille_ent - Qualif3
 *
 * FONCTIONS
 * #tr_fonction_col #fonction_col - Qualif6 > 4
 * #tr_fonction_ent #fonction_ent - Qualif4
 */

// Fonction pour le traitement des questions
//question = function() {
function question() {

	// Type vide
	if ( $('#type').val()==="" ) {

		$('#tr_secteur').hide();
		$('#tr_taille_col').hide();
		$('#tr_taille_ent').hide();
		$('#tr_fonction_col').hide();
		$('#tr_fonction_ent').hide();

		videData ('#secteur');
		videData ('#taille_col');
		videData ('#taille_ent');
		videData ('#fonction_col');
		videData ('#fonction_ent');

	}
	else {

		/*
		//TEST
		$('#type').css('background','pink');
		$('#secteur').css('background','yellow');

		$('#taille_col').css('background','red');
		$('#taille_ent').css('background','green');

		$('#fonction_col').css('background','darkred');
		$('#fonction_ent').css('background','darkgreen');
		*/

		if ( $('#type').val()==="entreprise" ) {
		// Type Entreprise : type > secteur > effectif (ent) > fonctions (ent)

			//cacher
			$('#tr_taille_col').hide();
			$('#tr_fonction_col').hide();

			$('#tr_taille_ent').hide();
			$('#tr_fonction_ent').hide();

			//afficher
			$('#tr_secteur').show();

			//vider les donnees
			videData ('#taille_col');
			videData ('#fonction_col');

		} else if ( $('#type').val()==="collectivite" ) {
		// Type Collectivit√© : type > effectif (col) > fonctions (col)

			//cacher
			$('#tr_secteur').hide();

			$('#tr_taille_ent').hide();
			$('#tr_fonction_ent').hide();

			$('#tr_fonction_col').hide();

			//afficher
			$('#tr_taille_col').show();

			//vider les donnees
			videData ('#secteur');

			videData ('#taille_ent');
			videData ('#fonction_ent');

		} else if ( $('#type').val()==="etudiant" || $('#type').val()==="particulier" || $('#type').val()==="journaliste" || $('#type').val()==="autre" ) {
		// Type Etudiant, journaliste, particulier, autre : type

			//cacher
			$('#tr_secteur').hide();

			$('#tr_taille_col').hide();
			$('#tr_fonction_col').hide();

			$('#tr_taille_ent').hide();
			$('#tr_fonction_ent').hide();

			//afficher

			//vider les donnees
			videData ('#secteur');

			videData ('#taille_col');
			videData ('#fonction_col');

			videData ('#taille_ent');
			videData ('#fonction_ent');

		} else {
		// Pour tous les autres Type : type > effectif (ent) > fonctions (ent)

			//cacher
			$('#tr_secteur').hide();

			$('#tr_taille_col').hide();
			$('#tr_fonction_col').hide();

			$('#tr_fonction_ent').hide();

			//afficher
			$('#tr_taille_ent').show();

			//vider les donnees
			videData ('#secteur');

			videData ('#taille_col');
			videData ('#fonction_col');

		}

	}

	// Secteur Entreprise
	if ( $('#secteur').val()!=="" ) {
		$('#tr_taille_ent').show();
	}

	// Effectif Entreprise
	if ( $('#taille_ent').val()!=="" ) {
		$('#tr_fonction_ent').show();
	}

	// Effectif Collectivit√©
	if ( $('#taille_col').val()!=="" ) {
		$('#tr_fonction_col').show();
	}
}

// Fonction pour vider le contenu suivant id du champs
//videData = function(id) {
function videData(id) {
	if( $(id) ) {
		$(id).val('');
	}
}

//deselectData = function(id) {
function deselectData(id) {
	if( $(id) ) {
		$(id).checked = false;
	}
}


//deselectRadio = function(radioName) {
function deselectRadio(radioName) {

	array=$$('input');

	var value="";

	array.each(

		function (radio) {

			if ( radio.hasAttribute("name") && radio.readAttribute("name")==radioName )

			radio.checked = false;

		}

	);//End of each()

	return value;

}


//valeurRadio=function(radioName) {
function valeurRadio(radioName) {
	array=$$('input');
	var value="";
	array.each(
		function (radio) {
			if ( radio.hasAttribute("name") && radio.readAttribute("name")==radioName )
			if ( radio.checked=="true" || radio.checked ) value=radio.getValue();
		}
	);//End of each()
	return value;
}


//verifmail = function(adr) {
function verifmail(adr) {
	var reg= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;
	return reg.test(adr)
}
