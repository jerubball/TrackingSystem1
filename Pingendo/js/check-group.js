$( document ).ready(function() {
    checkLogin ();
});

function checkLogin () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
            if (this.responseText) {
                checkUser ();
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

function checkUser () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
            if (this.responseText == "0") {
                alert ("Your account was never set before.\nPlease sign in once.");
                redirectURL("login.html");
            }
            else {
                checkGroup ();
            }
        }
    };
    xmlhttp.open ("GET", "/php/login-find.php", true);
    xmlhttp.send ();
}

function checkGroup () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
        }
    };
    xmlhttp.open ("GET", "/php/group-check", true);
    xmlhttp.send ();
}