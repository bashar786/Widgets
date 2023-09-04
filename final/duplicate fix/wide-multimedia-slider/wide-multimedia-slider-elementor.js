
class wideMultimediaSliderHandlerClass extends elementorModules.frontend.handlers.Base {



  getDefaultSettings() {
    return {
      selectors: {
        mainSelector: '.widget-wide-multimedia-slider-v1',
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
    widgetWideMultimediaSlider(this.elements.$mainSelector).init();
  }

}

jQuery(window).on('elementor/frontend/init', () => {
  const addHandler = ($element) => {
    elementorFrontend.elementsHandler.addHandler(wideMultimediaSliderHandlerClass, {
      $element,
    });
  };

  elementorFrontend.hooks.addAction('frontend/element_ready/wideMultimediaSlider.default', addHandler);
});
