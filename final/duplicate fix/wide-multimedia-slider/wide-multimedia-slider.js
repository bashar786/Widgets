const widgetWideMultimediaSlider = (el) => {
    return {
        init() {
            new Swiper(el.find('.swiper-multimedia')[0], {
                watchSlidesProgress: true,
                slidesPerView: "auto",
                spaceBetween: 60,
                loop: true,
                centeredSlides: true,
                simulateTouch: false,
                speed: 1200,
                grabCursor: false,
                // scrollbar: {
                //     el: ".swiper-scrollbar",
                //     hide: false,
                // },
                navigation: {
                    nextEl: '.sl-nav-arrow-next',
                    prevEl: '.sl-nav-arrow-prev',
                },
                breakpoints: {
                    320: {
                      slidesPerView: 1,
                      spaceBetween: 30,
                      loop: false,
                    },
                    1025: {
                      slidesPerView: "auto",
                      spaceBetween: 60,
                    }
                  }
            });
        }
    }
  }