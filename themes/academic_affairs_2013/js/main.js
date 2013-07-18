$(document).ready(function() {
    //search in nav
    $("#search").click(function() {
        //fade in
        $("#search form").stop(true,true).fadeIn();

        //give focus to input
        $("#search form input").focus();
    });
    $("#search form").mouseleave(function() {
        $("#search form").delay(2000).stop(true,true).fadeOut();
    });

    //===  HOMEPAGE  ===//	
    //INITIALIZE HOMEPAGE SCROLLABLE BAR
    $("#scrollable-home").scrollable({
        next: '#mainnext',
        prev: '#mainprev',
        item: 'div',
        items: '.items',
        globalNav: true,
        circular: true,
        size: 1
    }).navigator({
        // select #flowtabs to be used as navigator 
        navi: "#flowtabs",
        // select A tags inside the navigator to work as items (not direct children) 
        naviItem: 'a',
        // assign "current" class name for the active A tag inside navigator 
        activeClass: 'current'
    }).autoscroll(5000);


    $('#mainprev').mouseenter(function() {
        $('#mainprev').stop().animate({
            opacity: '.75'
        });
    });

    $('#mainprev').mouseleave(function() {
        $('#mainprev').stop().animate({
            opacity: '0'
        });
    });

    $('#mainnext').mouseenter(function() {
        $('#mainnext').stop().animate({
            opacity: '.75'
        });
    });

    $('#mainnext').mouseleave(function() {
        $('#mainnext').stop().animate({
            opacity: '0'
        });
    });


    // === Accordian === //	

    if ($('.accordion h2.current').length < 1) {
        $('.accordion h2:first').addClass('current');
    }
    $(".accordion").tabs(".accordion div.pane", {
        tabs: 'h2',
        effect: 'slide',
        initialIndex: 0
    });

    // SUBMIT FORM
    $('#uploading').hide();
    $('#uploading').stop().fadeTo(0);
    $('#uploading').show();
});