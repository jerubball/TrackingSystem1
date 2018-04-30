function onSignIn(googleUser) {
// Useful data for your client-side scripts:
    var profile = googleUser.getBasicProfile();
    console.log("ID: " + profile.getId()); // Don't send this directly to your server!
    console.log('Full Name: ' + profile.getName());
    console.log('Given Name: ' + profile.getGivenName());
    console.log('Family Name: ' + profile.getFamilyName());
    console.log("Image URL: " + profile.getImageUrl());
    console.log("Email: " + profile.getEmail());

// The ID token you need to pass to your backend:
    var id_token = googleUser.getAuthResponse().id_token;
    console.log("ID Token: " + id_token);
/*
    $.post("savesettings.php",
    {
        idtoken: id_token,// this gives different tokens so replace with profile.getID(),
        fname: profile.getGivenName(),
        lname: profile.getFamilyName(),
        email: profile.getEmail(),
    });

    */
    updateProfile (profile);
    //redirectURL ("main.html");
}

function updateProfile (profile) {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
        }
    };
    xmlhttp.open ("GET", "/php/login-profile.php?id=" + profile.getId() + 
        "&first=" + profile.getGivenName() + "&last=" + profile.getFamilyName() + "&email=" + profile.getEmail(), true);
    xmlhttp.send ();
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
    console.log('User signed out.');
    updateSession ("");
    });
}

function updateSession (id) {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
        }
    };
    xmlhttp.open ("GET", "/php/login-cache.php?id=" + id, true);
    xmlhttp.send ();
}

function checkSignIn () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
            if (this.responseText) {
                checkNewUser ();
            }
            else {
                alert ("You are not signed in.");
            }
        }
    };
    xmlhttp.open ("GET", "/php/login-cache.php?id=check", true);
    xmlhttp.send ();
}

function checkNewUser () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
            if (this.responseText == "0") {
                alert ("Your account was never set before.\nPlease enter your information in settings page.");
                addNewUser ();
                //redirectURL("setting.html");
            }
            else {
                //redirectURL("map.html");
            }
        }
    };
    xmlhttp.open ("GET", "/php/login-find.php", true);
    xmlhttp.send ();
}

function addNewUser () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert (this.responseText);
            /*if (this.responseText) {
                redirectURL("error.html");
            }
            */
        }
    };
    xmlhttp.open ("GET", "/php/login-new.php", true);
    xmlhttp.send ();
}

function redirectURL (url) {
    // similar behavior as an HTTP redirect
    window.location.replace(url);
    // similar behavior as clicking on a link
    //window.location.href = url;
}