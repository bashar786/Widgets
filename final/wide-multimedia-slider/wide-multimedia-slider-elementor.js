
class wideMultimediaSliderHandlerClass extends elementorModules.frontend.handlers.Base {

  bindEvents() {
    widgetWideMultimediaSlider(jQuery('.widget-wide-multimedia-slider-v1')).init();
  }

}

jQuery( window ).on( 'elementor/frontend/init', () => {
  const addHandler = ( $element ) => {
     elementorFrontend.elementsHandler.addHandler(wideMultimediaSliderHandlerClass, {
        $element,
     });
  };

  elementorFrontend.hooks.addAction('frontend/element_ready/wideMultimediaSlider.default', addHandler);
});
