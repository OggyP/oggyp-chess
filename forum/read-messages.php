<html>
<head>
    <meta content = "text/html; charset = ISO-8859-1" http-equiv = "content-type">

    <script type = "application/javascript">
        function loadJSON() {
            var data_file = "/message-json?amount=100";
            var http_request = new XMLHttpRequest();
            try{
                // Opera 8.0+, Firefox, Chrome, Safari
                http_request = new XMLHttpRequest();
            }catch (e) {
                // Internet Explorer Browsers
                try{
                    http_request = new ActiveXObject("Msxml2.XMLHTTP");

                }catch (e) {

                    try{
                        http_request = new ActiveXObject("Microsoft.XMLHTTP");
                    }catch (e) {
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                    }

                }
            }

            http_request.onreadystatechange = function() {

                if (http_request.readyState == 4  ) {
                    // Javascript function JSON.parse to parse JSON data
                    var jsonObj = JSON.parse(http_request.responseText);

                    var message_number = 0;

                    document.open();

                    while (typeof (jsonObj[message_number]) !== "undefined") {
                        document.write("<p>");
                        document.write("<span class='username'");
                        if (jsonObj[message_number].user == "OggyP") {
                        	document.write('style="color:blue"');
                        }
                        document.write(">" + jsonObj[message_number].user);
                        document.write("</span>");
                        document.write("<span class='message'> " + jsonObj[message_number].message + "</span>");
                        document.write("<span class='time_stamp'>" + jsonObj[message_number].created_at + "</span>");
                        document.write("</p>");
                        message_number ++;
                    }

                    document.close();
                }
            }

            http_request.open("GET", data_file, true);
            http_request.send();
        }

    </script>
	<link rel="stylesheet" href="/resources/css/main.css">
    <title>JSON Read Test</title>
</head>

<body>
<h1>OggyP Social</h1>

<div id="messages">

</div>
<div class = "central">
    <button type = "button" onclick = "loadJSON()">Update Details </button>
</div>

</body>

</html>
