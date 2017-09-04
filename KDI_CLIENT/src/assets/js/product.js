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
