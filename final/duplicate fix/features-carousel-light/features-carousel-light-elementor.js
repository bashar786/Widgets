
class featuresCarouselLightHandlerClass extends elementorModules.frontend.handlers.Base {


  getDefaultSettings() {
    return {
      selectors: {
        mainSelector: '.widget-features-carousel-light-v1',
      },
    };
  }

  getDefaultElements() {
    const selectors = this.getSettings('selectors');
    return {
      $mainSelector: this.$element.find(selectors.mainSelector),
    };
  }

 
  bindEvents() {
    widgetFeaturesCarouselLight(this.elements.$mainSelector).init();
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
