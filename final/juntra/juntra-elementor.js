
class juntraHandlerClass extends elementorModules.frontend.handlers.Base {

  bindEvents() {
    widgetJuntra(jQuery('.widget-juntra-v1')).init();
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
