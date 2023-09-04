
class valuePropositionHandlerClass extends elementorModules.frontend.handlers.Base {

  getDefaultSettings() {
    return {
      selectors: {
        mainSelector: '.widget-value-proposition-v1',
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
    widgetValueProposition(this.elements.$mainSelector).init();
  }


}

jQuery( window ).on( 'elementor/frontend/init', () => {
  const addHandler = ( $element ) => {
     elementorFrontend.elementsHandler.addHandler(valuePropositionHandlerClass, {
        $element,
     });
  };

  elementorFrontend.hooks.addAction('frontend/element_ready/valueProposition.default', addHandler);
});
