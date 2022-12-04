$(document).ready(function () {
    $('.product').slick({
      slidesToShow: 2,
      arrows: true, // mất button
      autoplay: true,
      autoplaySpeed: 2000,
      dots: true,
  
      prevArrow: `<button type='button' class='slick-prev pull-left'><i class="fas fa-chevron-left"></i></button>`,
      nextArrow: `<button type='button' class='slick-next pull-right'><i class="fas fa-chevron-right"></i></i></button>`
  
  
    });
  });