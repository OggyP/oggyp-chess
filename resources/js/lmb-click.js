$(document).ready(function(){
    $("#lm-button").click(function(){
        document.cookie = "mode=light;path=/;SameSite=None; Secure";
        $("#lm-button").hide();
        $("#dm-button").show();
    });
});