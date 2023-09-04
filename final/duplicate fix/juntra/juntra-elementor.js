
class juntraHandlerClass extends elementorModules.frontend.handlers.Base {

  getDefaultSettings() {
    return {
      selectors: {
        mainSelector: '.widget-juntra-v1',
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
    widgetJuntra(this.elements.$mainSelector).init();
  }


}

jQuery( window ).on( 'elementor/frontend/init', () => {
  const addHandler = ( $element ) => {
     elementorFrontend.elementsHandler.addHandler(juntraHandlerClass, {
        $element,
     });
  };

  elementorFrontend.hooks.addAction('frontend/element_ready/Juntra.default', addHandler);
});
