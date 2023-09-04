
class beneficiosHandlerClass extends elementorModules.frontend.handlers.Base {

  bindEvents() {
    widgetBeneficios(jQuery('.widget-beneficios-v1')).init();
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
