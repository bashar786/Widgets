class FooterHandlerClass extends elementorModules.frontend.handlers.Base {

    getDefaultSettings() {
        return {
            selectors: {
                firstSelector: '.widget-footer-v2',
            },
        };
    }

    getDefaultElements() {
        const selectors = this.getSettings( 'selectors' );
        return {
            $firstSelector: this.$element.find( selectors.firstSelector ),
        };
    }

    bindEvents() {
        widgetFooter(this.elements.$firstSelector).init();
    }

}

jQuery( window ).on( 'elementor/frontend/init', () => {
    const addHandler = ( $element ) => {
        elementorFrontend.elementsHandler.addHandler( FooterHandlerClass, {
            $element,
        } );
    };
 
    elementorFrontend.hooks.addAction( 'frontend/element_ready/footer.default', addHandler );
 } );
 