$(document).ready(function(){
  
  $(".Modern-Slider").slick({
    autoplay:true,
    autoplaySpeed:10000,
    speed:600,
    slidesToShow:1,
    slidesToScroll:1,
    pauseOnHover:false,
    //dots:true,
    pauseOnDotsHover:true,
    cssEase:'ease-out',
   // fade:true,
    draggable:true,
    prevArrow:'<button class="PrevArrow"></button>',
    nextArrow:'<button class="NextArrow"></button>', 
  });
  
})