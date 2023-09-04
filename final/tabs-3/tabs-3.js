const widgetTabs3 = (el) => {
    return {
        init() {
            cabeiGlobalEqualHeightFix(el)
            el.find('.simple-tab-name').eq(0).addClass('is-active');
            el.find('.simple-tab-content').eq(0).addClass('is-active');

            
            el.find('.simple-tab-name').click(function(){
                
                let tab_id = jQuery(this).attr('data-tab');
            
                el.find('.simple-tab-name').removeClass('is-active');
                el.find('.simple-tab-content').removeClass('is-active');
            
                el.find(this).addClass('is-active');
                el.find("#"+tab_id).addClass('is-active');
            }); 
        }
    }
}