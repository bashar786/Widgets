
class featuresCarouselDarkHandlerClass extends elementorModules.frontend.handlers.Base {

  bindEvents() {
    widgetFeaturesCarouselDark(jQuery('.widget-features-carousel-dark-v1')).init();
  }

}

jQuery( window ).on( 'elementor/frontend/init', () => {
  const addHandler = ( $element ) => {
     elementorFrontend.elementsHandler.addHandler(featuresCarouselDarkHandlerClass, {
        $element,
     });
  };

  elementorFrontend.hooks.addAction('frontend/element_ready/featuresCarouselDark.default', addHandler);
});
