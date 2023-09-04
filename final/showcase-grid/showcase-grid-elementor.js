
class showcaseGridHandlerClass extends elementorModules.frontend.handlers.Base {

  bindEvents() {
    widgetShowcaseGrid(jQuery('.widget-showcase-grid-v1')).init();
  }

}

jQuery( window ).on( 'elementor/frontend/init', () => {
  const addHandler = ( $element ) => {
     elementorFrontend.elementsHandler.addHandler(showcaseGridHandlerClass, {
        $element,
     });
  };

  elementorFrontend.hooks.addAction('frontend/element_ready/showcaseGrid.default', addHandler);
});
