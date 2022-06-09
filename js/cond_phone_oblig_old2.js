/*
 * CHAMPS CONDITIONNELS PHONES MOBILE OU TEL oblig
 */
 $(document).ready(function() {
    condition_phones();
 });

 function condition_phones() {

    // TELEPHONE DIRECT
    $("[name=tel]").on("keyup", function() {

      if ($("[name=tel]").val() != "" && $("[name=mobile]").val() == "") {

         //si tel direct rempli on supprimer l'étoile & on modifie la class du champ tel mobile
         $("[name=mobile]").attr("placeholder", $("[name=mobile]").attr("placeholder").replace("*", ""));
         $("[name=mobile]").removeClass("formstyle2").addClass("formstyle");

      } else {

         //si tel direct supprimer on rajoute une étoile au champ tel mobile
         $("[name=mobile]").attr("placeholder", $("[name=mobile]").attr("placeholder") + "*");
         // $("[name=mobile]").removeClass("formstyle").addClass("formstyle2");

      }

   });

   // TELEPHONE MOBILE
   $("[name=mobile]").on("keyup", function() {

      if ($("[name=mobile]").val() != "" && $("[name=tel]").val() == "") {

         //si tel mobile rempli on supprimer l'étoile & on modifie la class du champ tel direct
         $("[name=tel]").attr("placeholder", $("[name=tel]").attr("placeholder").replace("*", ""));
         $("[name=tel]").removeClass("formstyle2").addClass("formstyle");

      } else {

         //si tel mobile supprimer on rajoute une étoile au champ tel direct
         $("[name=tel]").attr("placeholder", $("[name=tel]").attr("placeholder") + "*");
         // $("[name=tel]").removeClass("formstyle").addClass("formstyle2");

      }

   });

 }
