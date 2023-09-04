
class featuresCarouselDarkHandlerClass extends elementorModules.frontend.handlers.Base {

  getDefaultSettings() {
    return {
      selectors: {
        mainSelector: '.widget-features-carousel-dark-v1',
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
    widgetFeaturesCarouselDark(this.elements.$mainSelector).init();
}


}

jQuery(window).on('elementor/frontend/init', () => {
  const addHandler = ($element) => {
    elementorFrontend.elementsHandler.addHandler(featuresCarouselDarkHandlerClass, {
      $element,
    });
  };

  elementorFrontend.hooks.addAction('frontend/element_ready/featuresCarouselDark.default', addHandler);
});
console.log('hello');