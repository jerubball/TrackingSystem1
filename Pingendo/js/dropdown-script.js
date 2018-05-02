$( document ).ready(function() {
    checkLogin ();
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

function updateDropdown (id) {
    var xmlhttp = new XMLHttpRequest ();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText);
            alert (document.getElementById(id).innerHTML);
            var names = this.responseText.split (";");
            var htmltext = "";
            for (var i = 0; i < names.length; i++) {
                alert (names[i]);
                //var item = document.createElement("button");
            }
            
            //document.getElementById(id).innerHTML = htmltext;
        }
    };
    xmlhttp.open ("GET", "/php/group-child.php", true);
    xmlhttp.send ();
}