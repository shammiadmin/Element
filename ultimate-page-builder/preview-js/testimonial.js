jQuery(document).ready(function($) {

//  TESTIMONIALS CAROUSEL HOOK
 

  $(".bubble").owlCarousel({
      loop: true,
      center: true,
      items: 1,
      margin: 0,
       
      dots:true,
      singleItem: true,
      autoPlay: true
  });
   


  $(".ticker").owlCarousel({
      loop: true,
      center: true,
      items: 1,
      margin: 0,
      navigation: false,
      dots:true,
      slideSpeed: 100,
      paginationSpeed: 800,
      singleItem: true,
      autoPlay: true
  });



  $('.box-3').owlCarousel({
      margin: 0,
      items: 3,
      nav: false,
      loop: true,
      autoPlay: true  
  });
  
  $('.box-2').owlCarousel({
      margin: 0,
      items: 2,
      nav: false,
      loop: true,
      autoPlay: true,
  });

  $('.box-1').owlCarousel({
      margin: 10,
      items: 1,
      nav: false,
      loop: true,
      autoPlay: true
  });

});

