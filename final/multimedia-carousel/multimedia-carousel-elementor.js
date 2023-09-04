
class multimediaCarouselHandlerClass extends elementorModules.frontend.handlers.Base {

  bindEvents() {
    widgetMultimediaCarousel(jQuery('.widget-multimedia-carousel-v1')).init();
  }

}

jQuery( window ).on( 'elementor/frontend/init', () => {
  const addHandler = ( $element ) => {
     elementorFrontend.elementsHandler.addHandler(multimediaCarouselHandlerClass, {
        $element,
     });
  };

  elementorFrontend.hooks.addAction('frontend/element_ready/multimediaCarousel.default', addHandler);
});
