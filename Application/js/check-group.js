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
    xmlhttp.open ("GET", "../php/login-cache.php?id=check", true);
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
    xmlhttp.open ("GET", "../php/login-find.php", true);
    xmlhttp.send ();
}

function checkGroup () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText) {
                //alert (this.responseText);
                getAccountType();
            }
            else {
                alert ("You do not belong to any group.\nPlease create group.");
                redirectURL("setting.html");
            }
        }
    };
    xmlhttp.open ("GET", "../php/group-check.php", true);
    xmlhttp.send ();
}

function getAccountType () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
            var args = this.responseText.split (";");
            var type = args[4];
            if (type == "Child") {
                //hideById('control');
                //document.getElementById('refreshMapBtn').innerHTML = "Last 12 Hours";
            }
            else {
                hideById('selection');
                document.getElementById('selectTimeBtn').innerHTML = "Last 12 Hours";
            }
        }
    };
    xmlhttp.open ("GET", "../php/profile-get.php", true);
    xmlhttp.send ();
}