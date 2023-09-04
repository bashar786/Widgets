class DocumentsAccordionHandlerClass extends elementorModules.frontend.handlers.Base {


    bindEvents() {
        widgetDocumentsAccordion(jQuery('.widget-documents-accordion-v1')).init();

    }
    
}

jQuery( window ).on( 'elementor/frontend/init', () => {
   const addHandler = ( $element ) => {
       elementorFrontend.elementsHandler.addHandler( DocumentsAccordionHandlerClass, {
           $element,
       } );
   };

   elementorFrontend.hooks.addAction( 'frontend/element_ready/documentsAccordion.default', addHandler );
} );
