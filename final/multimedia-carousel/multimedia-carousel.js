const widgetMultimediaCarousel = (el) => {
    return {
        init() {
            cabeiGlobalEqualHeightFix(el)
            new Swiper(el.find('.swiper-multimedia-carousel')[0], {
                slidesPerView: 2,
                spaceBetween: 92,
                scrollbar: {
                    el: ".swiper-scrollbar",
                    hide: false,
                },
                navigation: {
                    nextEl: '.sl-nav-arrow-next',
                    prevEl: '.sl-nav-arrow-prev',
                },
                breakpoints: {
                    320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                    },
                    768: {
                    slidesPerView: 1,
                    spaceBetween: 20
                    },
                    1025: {
                    slidesPerView: 2,
                    spaceBetween: 92
                    }
                }
            });
        }
    }
  }