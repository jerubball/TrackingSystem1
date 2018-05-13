function hideById (id) {
  var x = document.getElementById(id);
  if (x.style.display === "none") {
    x.style.display = "block";
  }
  else {
    x.style.display = "none";
  }
}

function toggleTextById (id1, id2) {
    var x = document.getElementById(id1);
    var y = document.getElementById(id2);
    if (y.style.display === "none") {
        x.innerHTML = "Expand";
    }
    else {
        x.innerHTML = "Collapse";
    }
}

function shiftTextById (id, texts) {
    var x = document.getElementById(id);
    var j = 0;
    for (var i = 0; i < texts.length; i++) {
        if (texts[i] == x.innerHTML) {
            j = i + 1;
        }
    }
    j = j % texts.length;
    x.innerHTML = texts[j];
}