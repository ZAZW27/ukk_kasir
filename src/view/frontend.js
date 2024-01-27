// console.log('front end ready')
$(document).off('click', '.btn').on('click', '.btn', function () {
    $(this).addClass('scale-90 transition-all duration-50 ease-in-out').removeClass('scale-100');
    setTimeout(() => {
        $(this).removeClass('scale-90').addClass('scale-100');
    }, 100);
})