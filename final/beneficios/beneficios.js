const widgetBeneficios = (el) => {
    return {
        init() {
            new Swiper(el.find('.swiper-beneficios')[0], {
              slidesPerView: 4,
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
                  slidesPerView: 3,
                  spaceBetween: 20
                },
                1025: {
                  slidesPerView: 4,
                  spaceBetween: 30
                }
              }
          });
        }
    }
  }