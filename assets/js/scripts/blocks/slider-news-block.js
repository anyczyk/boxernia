// import Swiper from 'swiper';

export const sliderNewsBlock = () => {
    const bskSlider = document.querySelectorAll(".bsk-slider");
    if(bskSlider.length) {
        console.log("sliderNewsBlock loaded");
        const swiper = new Swiper(".bsk-slider__swiper", {
            slidesPerView: 1,
            spaceBetween: 32,
            loop: false,
            centeredSlides: false,
            slideVisibleClass: true,
            preloadImages: true,
            navigation: {
                prevEl: '.bsk-slider__swiper-prev',
                nextEl: '.bsk-slider__swiper-next',
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
            }
        })
    }
};