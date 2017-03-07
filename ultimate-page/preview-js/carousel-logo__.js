$(document).ready(function() {
    var owl = $('.logocarousel');
        owl.owlCarousel({
        items: 6,
        loop: true,
        margin: 10,
        nav:true,
        autoplay: true,
        });
    $( ".owl-prev").html('<i class="fa fa-arrow-left" aria-hidden="true"></i>');
    $( ".owl-next").html('<i class="fa fa-arrow-right" aria-hidden="true"></i>');

});
