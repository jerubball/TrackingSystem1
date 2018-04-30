$( document ).ready(function() {
    checkLogin ();
});

function checkLogin () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
            if (this.responseText) {
                checkGroup ();
            }
            else {
                alert ("You are not signed in.\nPlease sign in.");
                redirectURL ("login.html");
            }
        }
    };
    xmlhttp.open ("GET", "/php/login-cache.php?id=check", true);
    xmlhttp.send ();
}

function checkGroup () {
}