new Swiper('.mySwiper',{
     navigation: {
        nextEl: '.next',
        prevEl: '.prev'
     },
     slidesPerView: 3,
     loop: true,
     effect: 'coverflow',
     grabCursor: true,
     centeredSlides: true,
     slidesPerView: 'auto',
     coverflowEffect: {
         rotate: 0,
         stretch: 10,
         depth: 100,
         modifier: 3,
         slideShadows: false,
     },
     
});