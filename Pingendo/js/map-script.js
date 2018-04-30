
function map1() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showMap1);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}

function showMap1 (position) {
  var myCenter = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  var mapCanvas = document.getElementById("map1");
  var mapOptions = {center: myCenter, zoom: 12};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
  var infowindow = new google.maps.InfoWindow({
    content: "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude
  });
  infowindow.open(map,marker);
  updateDB (position);
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