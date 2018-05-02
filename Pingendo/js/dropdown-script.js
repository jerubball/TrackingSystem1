$( document ).ready(function() {
    updateDropdown ('selectChild');
});

$(".dropdown-menu li a").click(function(){
  $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
  $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
});

$(".dropdown-menu a").click(function(){
  $(this).parents(".btn-group").find('.btn').html($(this).text() + ' <span class="caret"></span>');
  $(this).parents(".btn-group").find('.btn').val($(this).data('value'));
});

$(".dropdown-menu button").click(function(){
  $(this).parents(".btn-group").find('.btn').html($(this).text() + ' <span class="caret"></span>');
  $(this).parents(".btn-group").find('.btn').val($(this).data('value'));
});

function selectDropdown (id, txt) {
    document.getElementById(id).innerHTML = txt;
}

function updateDropdown (id) {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
            var names = this.responseText.split (";");
            var htmltext = "";
            for (var i = 0; i < names.length - 1; i++) {
                htmltext += "<button class=\"dropdown-item\" type=\"button\" onclick=\"selectDropdown('selectChildBtn', '" + names[i] + "')\">" + names[i] + "</button>\n";
            }
            
            document.getElementById(id).innerHTML = htmltext;
        }
    };
    xmlhttp.open ("GET", "/php/group-child.php", true);
    xmlhttp.send ();
}