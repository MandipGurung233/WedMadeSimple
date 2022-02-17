/*navigation bar*/
$(function(){
    var navbar = $('.navigationSecond');
    $(window).scroll(function(){
        if($(window).scrollTop() <= 30){
            navbar.removeClass('navbar-scroll');
            navbar.removeClass('bg-primary');
            navbar.removeClass('logos');
            navbar.removeClass('logo');
        } else{
            navbar.addClass('navbar-scroll');
            navbar.addClass('bg-primary');
            navbar.addClass('logo');
            navbar.addClass('logos');
        }
    });
});

/*go to top*/
$(function(){
    var navbar = $('.back');
    $(window).scroll(function(){
        if($(window).scrollTop() <= 150){
            navbar.removeClass('back-top');
            navbar.removeClass('icon');
            
        } else{
            navbar.addClass('back-top');
            navbar.addClass('icon');
        }
    });
});