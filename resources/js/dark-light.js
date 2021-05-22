
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function changeCSS(cssFile, cssLinkIndex) {

    var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

    var newlink = document.createElement("link");
    newlink.setAttribute("rel", "stylesheet");
    newlink.setAttribute("type", "text/css");
    newlink.setAttribute("href", cssFile);

    document.getElementsByTagName("head").item(cssLinkIndex).replaceChild(newlink, oldlink);
}

// Dark mouse button click

$(document).ready(function(){
    $("#dm-button").click(function(){
        document.cookie = "mode=dark;path=/;SameSite=None; Secure";
        $("#dm-button").hide();
        $("#lm-button").show();
        $("#gy-button").show();
    });
});

// Light mouse button click

$(document).ready(function(){
    $("#lm-button").click(function(){
        document.cookie = "mode=light;path=/;SameSite=None; Secure";
        $("#lm-button").hide();
        $("#dm-button").show();
        $("#gy-button").show();
    });
});

$(document).ready(function(){
    $("#gy-button").click(function() {
		document.cookie = "mode=ugly;path=/;SameSite=None; Secure";
		$("#gy-button").hide();
		$("#dm-button").show();
		$("#lm-button").show();
    });
});

// MAIN

$(document).ready(function(){
    let mode = getCookie("mode");
    if(mode == '') {
    	document.cookie = "mode=dark;path=/;SameSite=None; Secure";
        $("#dm-button").hide();
        $("#lm-button").show();
        $("#gy-button").show();
    } else {
        if (mode == "dark") {
            $("#dm-button").hide();
            $("#lm-button").show();
            $("#gy-button").show();
        }
        if (mode == "light") {
            $("#lm-button").hide();
            $("#dm-button").show();
            $("#gy-button").show();
        }
        if (mode == "ugly") {
            $("#gy-button").hide();
            $("#dm-button").show();
            $("#lm-button").show();
        }
    }
});
