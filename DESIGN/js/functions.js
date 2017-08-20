$(function ()
{
    location.href.match('index') ?
    setTimeout(function () {
        $( "#aff_sidebar_form" ).trigger( "click" );
    },2000) : ''

    function close_form()
    {

    }

    $(window).scroll(function()
    {
        ($(this).scrollTop() >= 50) ? $('#return-to-top').fadeIn(200) :  $('#return-to-top').fadeOut(200) ;
    });

    $('#return-to-top').click(function()
    {
        $('body,html').animate({
            scrollTop : 0
        }, 500);
    });

    $('#btn-scroll').click(function() {
        $('body,html').animate({
            scrollTop :  $('#rayons').offset().top
        }, 500);
    });

});