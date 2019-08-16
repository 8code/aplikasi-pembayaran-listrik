(function($) {
    $.fn.routejs = function(){
        $(this).click(function(){
            var tar = $(this).attr('href');
            var targ = tar.split("#");
            var target = targ[1];
            $("#routejs").load("components/"+target);
            if($('body').width() <800 ){
                $(".sidenav").removeClass("active-sidenav");
            }
        });
    };
    var geturl = document.baseURI;
    var spliturl = geturl.split("/");
    var urls = spliturl[3];
    var end = urls.split("#");
    var route = end[1];
    if(route){
        $.get("components/"+route, function(data){
          $("#routejs").html(data);
          $('#routejs').toggleClass("transition");
        });
    }else{
        $("#routejs").load("components/home");  
        $('#routejs').toggleClass("transition");
    }
    $('.routejs').routejs();

}(jQuery));