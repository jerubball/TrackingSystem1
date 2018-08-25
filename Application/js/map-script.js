
function map1() {
    if (navigator.geolocation) {
        var xmlhttp = new XMLHttpRequest ();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                //alert (this.responseText);
                var args = this.responseText.split (";");
                var type = args[4];
                if (type == "Child") {
                    navigator.geolocation.watchPosition(showMap1);
                }
                else {
                    navigator.geolocation.getCurrentPosition(showMap1);
                }
            }
        };
        xmlhttp.open ("GET", "../php/profile-get.php", true);
        xmlhttp.send ();
    }
    else {
        alert("Geolocation is not supported by this browser.");
    }
}

function map1a() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showMap1);
    }
    else {
        alert("Geolocation is not supported by this browser.");
    }
}

function updateMap1 () {
    var name = document.getElementById('selectChildBtn').innerHTML;
    if (name == "Select Child") {
        alert ("Please select a child");
    }
    else {
        var duration = getDuration ();
        //alert (duration)
        var xmlhttp = new XMLHttpRequest ();
        xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          //alert (this.responseText);
          var coords = this.responseText.split(";");
          var centers = [];
          for (var i = 0; i < coords.length - 1; i++) {
              var coord = coords[i].split(",");
              //alert (parseFloat(coord[0]) + ", " + parseFloat(coord[1]) + " @ " + coord[2]);
              centers.push (new google.maps.LatLng(parseFloat(coord[0]), parseFloat(coord[1])));
          }
          var myCenter = centers[centers.length - 1];
          var mapCanvas = document.getElementById("map1");
          var mapOptions = {center: myCenter, zoom: 12};
          var map = new google.maps.Map(mapCanvas, mapOptions);
          var flightPath = new google.maps.Polyline({
            path: centers,
            strokeColor: "#0000FF",
            strokeOpacity: 0.8,
            strokeWeight: 2
          });
          flightPath.setMap(map);
          var marker = new google.maps.Marker({position:myCenter});
          marker.setMap(map);
          var cord = coords[coords.length - 2].split(",");
          var infowindow = new google.maps.InfoWindow({
            content: name + "'s Location.<br>Latitude: " + cord[0] + "<br>Longitude: " + cord[1] + "<br>@ " + cord[2]
          });
          infowindow.open(map,marker);
        }
      };
      xmlhttp.open ("GET", "../php/map-retrieve.php?name=" + name + "&dur=" + duration, true);
      xmlhttp.send ();
    }
}

function showMap1 (position) {
  updateDB (position);
  //var duration = getDuration ();
  var xmlhttp = new XMLHttpRequest ();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //alert (this.responseText);
      var coords = this.responseText.split(";");
      var centers = [];
      for (var i = 0; i < coords.length - 1; i++) {
          var coord = coords[i].split(",");
          //alert (parseFloat(coord[0]) + ", " + parseFloat(coord[1]) + " @ " + coord[2]);
          centers.push (new google.maps.LatLng(parseFloat(coord[0]), parseFloat(coord[1])));
      }
      var myCenter = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
      centers.push (myCenter);
      var mapCanvas = document.getElementById("map1");
      var mapOptions = {center: myCenter, zoom: 12};
      var map = new google.maps.Map(mapCanvas, mapOptions);
      var flightPath = new google.maps.Polyline({
        path: centers,
        strokeColor: "#0000FF",
        strokeOpacity: 0.8,
        strokeWeight: 2
      });
      flightPath.setMap(map);
      var marker = new google.maps.Marker({position:myCenter});
      marker.setMap(map);
      var infowindow = new google.maps.InfoWindow({
        content: "Your Location.<br>Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude
      });
      infowindow.open(map,marker);
    }
  };
  xmlhttp.open ("GET", "../php/map-retrieve.php?name=&dur=", true);
  xmlhttp.send ();
  
}

function alertLocation (position) {
  alert ("Latitude: " + position.coords.latitude + " Longitude: " + position.coords.longitude);
}

function updateDB (position) {
  var xmlhttp = new XMLHttpRequest ();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //alert (this.responseText);
    }
  };
  xmlhttp.open ("GET", "../php/map-update.php?lat=" + position.coords.latitude + "&lon=" + position.coords.longitude, true);
  xmlhttp.send ();
}

function getDuration () {
    var x = document.getElementById('selectTimeBtn');
    var y = document.getElementById('refreshMapBtn');
    var z = x;
    
    if (x.innerHTML == "Select Duration") {
        if (y.innerHTML == "Select Duration") {
            return -1;
        }
        else {
            z = y;
        }
    }
    
    var sel = z.innerHTML;
    if (sel == "Last 12 Hours") {
        return 43200;
    }
    else if (sel == "Last 24 Hours") {
        return 86400;
    }
    else if (sel == "Last 48 Hours") {
        return 172800;
    }
    else if (sel == "Last 1 Week") {
        return 604800;
    }
    else if (sel == "Last 2 Weeks") {
        return 1209600;
    }
    else if (sel == "Last 1 Month") {
        return 2592000;
    }
    else {
        return 0;
    }
}