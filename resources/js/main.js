$(document).ready(function(){
   let mode = getCookie("mode");
   if(mode == '') {
      $("#dm-button").hide();
      $("#lm-button").show();
   } else {
      if (mode == "dark") {
         changeCSS('/resources/css/dark.css', 0)
         $("#dm-button").hide();
         $("#lm-button").show();
         $("#gy-button").show();
      }
      if (mode == "light") {
         changeCSS('/resources/css/light.css', 0)
         $("#lm-button").hide();
         $("#dm-button").show();
         $("#gy-button").show();
      }
      if (mode == "ugly") {
         changeCSS('/resources/css/ew.css', 0)
         $("#gy-button").hide();
         $("#dm-button").show();
         $("#lm-button").show();
      }
   }
});