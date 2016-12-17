jQuery(document).ready(function($) {
    var lastScrollTop = 0;
    $(window).scroll(function(){
       var st = $(this).scrollTop();
           
        if (st > 550){
            $(".navbar").css('top', '-50px');
            $(".navbar-collapse").removeClass("in"); 
        } else{
            $(".navbar").css('top', '0px');
        }

        if (st < lastScrollTop){
            $(".navbar").css('top', '0px');
        }
        
        lastScrollTop = st;

        if($(window).scrollTop() + $(window).height() == $(document).height()) {
            $(".navbar").css('top', '0px');
        }
    })   
    
    $(".navbar-toggle").click(function(){
        $("body").toggleClass("overlay-activated");
    })

    $(".overlay").click(function(){
        $(".navbar-toggle").click();
    })

});