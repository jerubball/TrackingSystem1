$( document ).ready(function() {
    getProfile ();
});

function getProfile () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert (this.responseText);
            var args = this.responseText.split (";");
        }
    };
    xmlhttp.open ("GET", "/php/get-profile.php", true);
    xmlhttp.send ();
    document.getElementById('accountFirst').value = "Sample";
}

function updateProfile(id) {
}