(function($) {
     $.fn.sidenav = function(){
        var push = $(this).attr('push');
        if(push == 'true'){
            $('main').addClass("push-sidenav");
            var target =  $("#"+$(this).attr('target'));
            target.addClass("active-sidenav");
        }
        $(this).click(function(){
            var target = $("#"+$(this).attr('target'));
            target.toggleClass("active-sidenav");
            var push = $(this).attr('push');
            if(push == 'true'){
                $('main').toggleClass("push-sidenav");
            }
            if($('body').width() <800 ){
                  $('main').prepend('<div class="main-close-sidenav"></div>');
                  if(push == 'true'){
                    $('main').removeClass("push-sidenav");
                  }
                 $('.main-close-sidenav').click(function(){
                       $(".sidenav").removeClass("active-sidenav");
                       $('.main-close-sidenav').removeClass("main-close-sidenav");
                 });         
            };
        });
        if($('body').width() <800 ){
            $('.sidenav').addClass("sidenav-top");
            $('.sidenav').removeClass("active-sidenav");
            $('main').removeClass("push-sidenav");
            
        } 
    }
    $.fn.collapse = function(){
        $(this).click(function(){
            var target = $("#"+$(this).attr('target'));
            target.toggle();
            target.addClass("transition");
        });
        $(this).append('<i class="material-icons right">arrow_drop_down</i>');
    }

$(".dropdown").append('<i class="material-icons right">arrow_drop_down</i>');
$('.btn-sidenav').sidenav();   
$('.collapse').collapse();    
}(jQuery));

(function($) {

function openFullscreen(elem) {
  elem = elem || document.documentElement;
  if (!document.fullscreenElement && !document.mozFullScreenElement &&
    !document.webkitFullscreenElement && !document.msFullscreenElement) {
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
      elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  }else{
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}
function closefullscreen(elem){
  elem = elem || document.documentElement;
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
}
$('#fullscreen').click(function() {
  openFullscreen();
});

$.fn.iconright = function(){
    $(this).append('<i class="material-icons right">tchevron_right</i>');
}

$('.menu- a').iconright();
}(jQuery));
