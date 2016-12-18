jQuery(document).ready(function($) {

    //automatically move fixed navbar on the top
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
    
    //toggle overlay for navigation on mobile
    $(".navbar-toggle").click(function(){
        $("body").toggleClass("overlay-activated");
    })

    //hide navbar on mobile when clicked outside of it
    $(".overlay").click(function(){
        $(".navbar-toggle").click();
    }) 

    //responsive youtube videos
    $('iframe').wrap('<div class="embed-container" />');

});