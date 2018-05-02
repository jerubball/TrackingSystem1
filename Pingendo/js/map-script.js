
function map1() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showMap1);
    }
    else {
        alert("Geolocation is not supported by this browser.");
    }
}

function updateMap1 () {
    var name = document.getElementById('selectChildBtn').innerHTML;
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          //alert (this.responseText);
          var coords = this.responseText.split(";");
          var centers = [];
          for (var i = 0; i < coords.length - 1; i++) {
              var coord = coords[i].split(",");
              //alert (parseFloat(coord[0]) + ", " + parseFloat(coord[1]));
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
            content: name + "'s Location.<br>Latitude: " + cord[0] + "<br>Longitude: " + cord[1]
          });
          infowindow.open(map,marker);
        }
      };
      xmlhttp.open ("GET", "/php/map-retrieve.php?name=" + name, true);
      xmlhttp.send ();
}

function showMap1 (position) {
  updateDB (position);
  var xmlhttp = new XMLHttpRequest ();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //alert (this.responseText);
      var coords = this.responseText.split(";");
      var centers = [];
      for (var i = 0; i < coords.length - 1; i++) {
          var coord = coords[i].split(",");
          //alert (parseFloat(coord[0]) + ", " + parseFloat(coord[1]));
          centers.push (new google.maps.LatLng(parseFloat(coord[0]), parseFloat(coord[1])));
      }
      var myCenter = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
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
  xmlhttp.open ("GET", "/php/map-retrieve.php?name=", true);
  xmlhttp.send ();
  
}

function alertLocation (position) {
  alert ("Latitude: " + position.coords.latitude + " Longitude: " + position.coords.longitude);
}

function updateDB (position)
{
  var xmlhttp = new XMLHttpRequest ();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //alert (this.responseText);
    }
  };
  xmlhttp.open ("GET", "/php/map-update.php?lat=" + position.coords.latitude + "&lon=" + position.coords.longitude, true);
  xmlhttp.send ();
}