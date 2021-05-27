setInterval(loadDoc, 500);

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

function onDocumentLoad() {
    if (getCookie('amount') != '') {
        document.getElementById("messages-input-amount").value = getCookie('amount');
    } else {
        document.cookie = "amount=" + 10;
    }

}

function loadDoc() {
    var messageamount = getCookie('amount');
    if (messageamount === '') {
        messageamount = 10;
    }
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("message_panel").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "messages.php?amount="+messageamount, true);
    xhttp.send();

}

document.getElementById("message_input")
    .addEventListener("keyup", function(e) {
        if (e.code === 'Enter') {
            document.getElementById("message_button").click();
        }
    });

function saveLengthPreference() {
    messageAmountInput = document.getElementById("messages-input-amount").value;
    document.cookie = "amount=" + messageAmountInput;
}

function sendMessage() {
    var messageContent = document.getElementById("message_input").value;
    document.getElementById("message_input").value = "";
    if (messageContent.length == 0) {

    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "sendmessage.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("content=" + messageContent);
    }
}

window.onload = onDocumentLoad();