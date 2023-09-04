
class valuePropositionHandlerClass extends elementorModules.frontend.handlers.Base {

  bindEvents() {
    widgetValueProposition(jQuery('.widget-value-proposition-v1')).init();
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
