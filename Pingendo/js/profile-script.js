$( document ).ready(function() {
    getProfile ();
});

function getProfile () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
            var args = this.responseText.split (";");
            document.getElementById('accountFirst').value = args[0];
            document.getElementById('accountLast').value = args[1];
            document.getElementById('accountEmail').value = args[2];
            document.getElementById('accountGender').value = args[3];
            var group = args[4];
            if (group == "") {
                document.getElementByID('groupBlockBtn').innerHTML = "Create Group";
            }
            else {
                //getGroup ();
            }
        }
    };
    xmlhttp.open ("GET", "/php/get-profile.php", true);
    xmlhttp.send ();
}

function getGroup () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
            var args = this.responseText.split (";");
            document.getElementById('accountFirst').value = args[0];
            document.getElementById('accountLast').value = args[1];
            document.getElementById('accountEmail').value = args[2];
            document.getElementById('accountGender').value = args[3];
            var group = args[4];
            if (group == "") {
                document.getElementByID('groupBlockBtn').innerHTML = "Create Group";
            }
            else {
                getGroup ();
            }
        }
    };
    xmlhttp.open ("GET", "/php/get-group.php", true);
    xmlhttp.send ();
}

function updateProfile() {
    var fname = document.getElementById('accountFirst').value;
    var lname = document.getElementById('accountLast').value;
    var email = document.getElementById('accountEmail').value;
    var gender = document.getElementById('accountGender').value;
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert (this.responseText);
        }
    };
    xmlhttp.open ("GET", "/php/update-profile.php?fname=" + fname + "&lname=" + lname + "&email=" + email + "&gender=" + gender, true);
    xmlhttp.send ();
}

function updateGroup () {
    var fname = document.getElementById('accountFirst').value;
    var lname = document.getElementById('accountLast').value;
    var email = document.getElementById('accountEmail').value;
    var gender = document.getElementById('accountGender').value;
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert (this.responseText);
        }
    };
    xmlhttp.open ("GET", "/php/update-profile.php?fname=" + fname + "&lname=" + lname + "&email=" + email + "&gender=" + gender, true);
    xmlhttp.send ();
}