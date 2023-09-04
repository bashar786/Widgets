
class ChartHandlerClass extends elementorModules.frontend.handlers.Base {

  getDefaultSettings() {
    return {
      selectors: {
        mainSelector: '.widget-chart-v1',
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
    widgetChart(this.elements.$mainSelector).init();
  }


}

jQuery( window ).on( 'elementor/frontend/init', () => {
  const addHandler = ( $element ) => {
     elementorFrontend.elementsHandler.addHandler(ChartHandlerClass, {
        $element,
     });
  };

  elementorFrontend.hooks.addAction('frontend/element_ready/chart.default', addHandler);
});
