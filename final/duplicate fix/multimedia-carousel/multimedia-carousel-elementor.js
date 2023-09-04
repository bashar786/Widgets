
class multimediaCarouselHandlerClass extends elementorModules.frontend.handlers.Base {

  getDefaultSettings() {
    return {
      selectors: {
        mainSelector: '.widget-multimedia-carousel-v1',
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
    widgetMultimediaCarousel(this.elements.$mainSelector).init();
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
