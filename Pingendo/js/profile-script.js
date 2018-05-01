$( document ).ready(function() {
    getProfile ();
});

function getProfile () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert (this.responseText);
            var args = this.responseText.split (";");
            document.getElementById('accountFirst').value = args[0];
            document.getElementById('accountLast').value = args[1];
            document.getElementById('accountEmail').value = args[2];
            document.getElementById('accountGender').value = args[3];
        }
    };
    xmlhttp.open ("GET", "/php/get-profile.php", true);
    xmlhttp.send ();
}

function updateProfile(id) {
}