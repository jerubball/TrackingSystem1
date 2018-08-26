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
            var type = args[4];
            if (type == "Child") {
                hideById('groupRemove');
                hideById('groupAdd');
                document.getElementById('addressStreet').disabled = true;
                document.getElementById('addressCity').disabled = true;
                document.getElementById('addressState').disabled = true;
                document.getElementById('addressZip').disabled = true;
                document.getElementById('groupUpdateBtn').disabled = true;
            }
            var group = args[5];
            if (group == "") {
                document.getElementById('groupBlockBtn').innerHTML = "Create Group";
            }
            else {
                getGroup ();
            }
        }
    };
    xmlhttp.open ("GET", "./php/profile-get.php", true);
    xmlhttp.send ();
}

function getGroup () {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
            var args = this.responseText.split (";");
            document.getElementById('addressStreet').value = args[0];
            document.getElementById('addressCity').value = args[1];
            document.getElementById('addressState').value = args[2];
            document.getElementById('addressZip').value = args[3];
        }
    };
    xmlhttp.open ("GET", "./php/group-get.php", true);
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
            //alert (this.responseText);
        }
    };
    xmlhttp.open ("GET", "./php/profile-update.php?fname=" + fname + "&lname=" + lname + "&email=" + email + "&gender=" + gender, true);
    xmlhttp.send ();
}

function updateGroup () {
    var street = document.getElementById('addressStreet').value;
    var city = document.getElementById('addressCity').value;
    var state = document.getElementById('addressState').value;
    var zip = document.getElementById('addressZip').value;
    
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText != "") {
                alert (this.responseText);
                location.reload();
            }
        }
    };
    xmlhttp.open ("GET", "./php/group-update.php?street=" + street + "&city=" + city + "&state=" + state + "&zip=" + zip, true);
    xmlhttp.send ();
}

function addChild () {
    var email = document.getElementById('childEmail').value;
    
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText != "") {
                alert (this.responseText);
                location.reload();
            }
        }
    };
    xmlhttp.open ("GET", "./php/group-add.php?email=" + email, true);
    xmlhttp.send ();
}

function deleteChild () {
    var name = document.getElementById('selectChildBtn').innerHTML;
    
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText != "") {
                alert (this.responseText);
                location.reload();
            }
        }
    };
    xmlhttp.open ("GET", "./php/group-remove.php?name=" + name, true);
    xmlhttp.send ();
}