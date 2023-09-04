const widgetFeaturesCarouselDark = (el) => {

    return {
        init() {
            cabeiGlobalEqualHeightFix(el)
            new Swiper(el.find('.swiper-features-carousel')[0], {
              slidesPerView: 3,
              spaceBetween: 30,
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
                  slidesPerView: 2,
                  spaceBetween: 20
                },
                1025: {
                  slidesPerView: 3,
                  spaceBetween: 30
                }
              }
          });
        }
    }
  }
  