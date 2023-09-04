
class featuresCarouselLightHandlerClass extends elementorModules.frontend.handlers.Base {

  bindEvents() {
    widgetFeaturesCarouselLight(jQuery('.widget-features-carousel-light-v1')).init();
  }

}

jQuery( window ).on( 'elementor/frontend/init', () => {
  const addHandler = ( $element ) => {
     elementorFrontend.elementsHandler.addHandler(featuresCarouselLightHandlerClass, {
        $element,
     });
  };

  elementorFrontend.hooks.addAction('frontend/element_ready/featuresCarouselLight.default', addHandler);
});
