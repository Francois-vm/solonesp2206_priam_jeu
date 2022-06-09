/*
 * CHAMPS CONDITIONNELS Case � cocher SMS true alors N� PORTABLE (MOBILE) oblig
 */
$(document).ready(function() {
   condition_sms_mobile();
});


function condition_sms_mobile() {

   //Si la case "Accepte de recevoir des informations par SMS" est cocher (true) ou d�cocher 'qualif29'
   $("#conditionSMS").hide(); //Cacher des �lements a afficher si la condition n'est pas rempli

   $("label.mobile").html("T&eacute;l. portable");

   condition_sms_showHide();

   $("#qualif29").change(function() {
      condition_sms_showHide();
   });

}

function condition_sms_showHide() {

   if ($('#qualif29').attr("checked")) { //la case est cocher

      document.getElementById('mandatoryOblig_conditionel').value = '1'; //le Mobile est un champ obligatoire (mailit)

      //afficher
      $("#conditionSMS").show(); //afficher les cases secondaire

      //modifier le label ou placeholder
      $("label.mobile").html("T&eacute;l. portable*"); //IE
      $("#mobile_sms").attr("placeholder", "T�l. portable*");

   } else { //la case est d�cocher

      document.getElementById('mandatoryOblig_conditionel').value = '0'; //le Mobile n'est plus un champ obligatoire

      //cacher
      $("#conditionSMS").hide(); //cacher la confirmation d'inscription pas sms

      //modifier le label ou placeholder
      $("label.mobile").html("T&eacute;l. portable"); //IE
      $("#mobile_sms").attr("placeholder", "T�l. portable");

      //vider les donnees
      condition_sms_videData('#mobile_sms');
   }
}

function condition_sms_videData(id) {
   if ($(id)) {
      $(id).val('');
   }
}
