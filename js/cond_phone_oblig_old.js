/*
 * CHAMPS CONDITIONNELS PHONES MOBILE OU TEL oblig
 */
$(function() {

   $("[name=tel]").on("keyup", function() {
      //alert("TEST");
      if ($("[name=tel]").val() != "" && $("[name=mobile]").val() == "") {
         $("[name=mobile]").attr("placeholder", $("[name=mobile]").attr("placeholder").replace("*", ""));
         $("[name=mobile]").removeClass("formstyle2").addClass("formstyle");
         //alert("TEST");
      } else {
         $("[name=mobile]").attr("placeholder", $("[name=mobile]").attr("placeholder") + "*");
      }
   });

   $("[name=mobile]").on("keyup", function() {
      //alert("TEST");
      if ($("[name=mobile]").val() != "" && $("[name=tel]").val() == "") {
         $("[name=tel]").attr("placeholder", $("[name=tel]").attr("placeholder").replace("*", ""));
         $("[name=tel]").removeClass("formstyle2").addClass("formstyle");
         //alert("TEST");
      } else {
         $("[name=tel]").attr("placeholder", $("[name=tel]").attr("placeholder") + "*");
      }
   });

});
