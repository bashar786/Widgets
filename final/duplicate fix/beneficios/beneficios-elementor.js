
class beneficiosHandlerClass extends elementorModules.frontend.handlers.Base {


  getDefaultSettings() {
    return {
      selectors: {
        mainSelector: '.widget-beneficios-v1',
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
    widgetBeneficios(this.elements.$mainSelector).init();
  }

}

jQuery( window ).on( 'elementor/frontend/init', () => {
  const addHandler = ( $element ) => {
     elementorFrontend.elementsHandler.addHandler(beneficiosHandlerClass, {
        $element,
     });
  };

  elementorFrontend.hooks.addAction('frontend/element_ready/Beneficios.default', addHandler);
});
