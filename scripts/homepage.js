$(document).ready(function() {
    $('#myCarousel').carousel({
        interval: 2000, // Changes every 2 seconds
        pause: false // Disable automatic pausing
    });

    // Preload the images before showing the carousel
    $('.preload-img').each(function() {
        const imgSrc = $(this).attr('src');
        const img = new Image();
        img.src = imgSrc;
        img.onload = function() {
            $(this).parent().removeClass('preload-img').addClass('loaded-img');
        }
    });
});