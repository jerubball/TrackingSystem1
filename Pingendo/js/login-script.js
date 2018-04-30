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
        idtoken: id_token,
        fname: profile.getGivenName(),
        lname: profile.getFamilyName(),
        email: profile.getEmail(),
    });
    console.log("after.post");
    */
    
    updateSession (profile.getId());
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
            alert (this.responseText);
        }
    };
    xmlhttp.open ("GET", "/php/login-cache.php?id=" + id, true);
    xmlhttp.send ();
}