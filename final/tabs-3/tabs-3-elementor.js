
class Tabs3HandlerClass extends elementorModules.frontend.handlers.Base {

  bindEvents() {
    widgetTabs3(jQuery('.widget-tabs-3-v1')).init();
  }

}

jQuery( window ).on( 'elementor/frontend/init', () => {
  const addHandler = ( $element ) => {
     elementorFrontend.elementsHandler.addHandler(Tabs3HandlerClass, {
        $element,
     });
  };

  elementorFrontend.hooks.addAction('frontend/element_ready/Tabs3.default', addHandler);
});
