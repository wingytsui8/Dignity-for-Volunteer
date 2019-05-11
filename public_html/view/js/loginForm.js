$('input[type="submit"]').mousedown(function(){
  $(this).css('background', '#2ecc71');
});
$('input[type="submit"]').mouseup(function(){
  $(this).css('background', '#1abc9c');
});

$('#loginform').click(function(){
  $('.login').fadeToggle('slow');
  $(this).toggleClass('green');
});

$(document).mouseup(function (e)
{
    var container = $(".login");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
        $('#loginform').removeClass('green');
        $('#loginEmail').val("");
        $('#loginPw').val("");
        
    }
});

window.onbeforeunload = function() {
   sessionStorage.setItem("lEmail", $('#loggedEmail').val());
   sessionStorage.setItem("islogged", $('$loggedfield').val());
}

window.onload = function() {
   var lEmailVal = sessionStorage.getItem("lEmail");
   var islogged = sessionStorage.getItem("islogged");
   if (islogged != null && lEmailVal !== null) {
    $('$loggedfield').val(islogged);
    $('#loggedEmail').val(lEmailVal);
  }
}