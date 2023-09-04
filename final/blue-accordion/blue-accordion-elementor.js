class BlueAccordionHandlerClass extends elementorModules.frontend.handlers.Base {


    bindEvents() {
        widgetBlueAccordion(jQuery('.widget-blue-accordion-v1')).init();

    }
    
}

jQuery( window ).on( 'elementor/frontend/init', () => {
   const addHandler = ( $element ) => {
       elementorFrontend.elementsHandler.addHandler( BlueAccordionHandlerClass, {
           $element,
       } );
   };

   elementorFrontend.hooks.addAction( 'frontend/element_ready/blueAccordion.default', addHandler );
} );
