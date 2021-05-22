$(document).ready(function(){
    $("#dm-button").click(function(){
        document.cookie = "mode=dark;path=/;SameSite=None; Secure";
        $("#dm-button").hide();
        $("#lm-button").show();
    });
});