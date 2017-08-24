$(function ()
{
    location.href.match('index') ?
        setTimeout(function () {
            $( "#aff_sidebar_form" ).trigger( "click" );
        },2000) : '';

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
        }, 700);
    });





    // FONCTIONS DU FICHER PRODUCT


    $('.btn-product-cart-plus').on('click', function (e) {
        e.preventDefault()
        var parent = $(this).parent('div.row');
        var input = parent.find('.form-control');
        var val = parseInt(input.val());
        input.val(val + 1)
    })

    $('.btn-product-cart-minus').on('click', function (e) {
        e.preventDefault()
        var parent = $(this).parent('div.row');
        var input = parent.find('.form-control');
        var val = parseInt(input.val());
        if ( val > 0)
            input.val(val - 1)
    })

    $('.rayon-row .content').on('click', function (e) {
        e.preventDefault();
        $(location).attr('href', $(this).attr('data-href'))
    })

    $('[data-toggle="popover"]').popover({
        placement: getPos()
    })

    function getPos() {
        if ($(window).width() <= 1200)  return 'left';
        return 'right'
    }




});