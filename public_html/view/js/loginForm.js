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

$(document).ready(function(){
    $('input[id="loginPw"]').keypress(function(e){
      if(e.keyCode==13)
      $('input[type="submit"]').click();
    });
});


$(document).mousedown(function (e)
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