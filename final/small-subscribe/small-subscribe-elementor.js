class smallSubscribeHandlerClass extends elementorModules.frontend.handlers.Base {

    getDefaultSettings() {
        return {
            selectors: {
                firstSelector: 'widget-small-subscribe-v1',
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
        widgetSmallSubscribe(this.elements.$firstSelector).init();
    }

}

jQuery( window ).on( 'elementor/frontend/init', () => {
    const addHandler = ( $element ) => {
        elementorFrontend.elementsHandler.addHandler( smallSubscribeHandlerClass, {
            $element,
        } );
    };
 
    elementorFrontend.hooks.addAction( 'frontend/element_ready/smallSubscribe.default', addHandler );
 } );
 