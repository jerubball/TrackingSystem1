$( document ).ready(function() {
        console.log( "document loaded" );
    });

$( window ).on( "load", function() {
    console.log( "window loaded" );
});

function checkSignIn () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
            if (this.responseText) {
                redirectURL ("/main.html");
            }
            else {
                alert ("You are not signed in.");
            }
        }
    };
    xmlhttp.open ("GET", "/php/login-cache.php?id=check", true);
    xmlhttp.send ();
}

function redirectURL (url) {
    // similar behavior as an HTTP redirect
    window.location.replace(url);
    // similar behavior as clicking on a link
    //window.location.href = url;
}