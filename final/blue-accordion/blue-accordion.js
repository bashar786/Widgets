const widgetBlueAccordion = (el) => {
    return {
        init() {
            el.find(".doc-relac-title").on("click", function(e) {

                e.preventDefault();
                let $this = $(this);
        
                if (!$this.hasClass("is-active")) {
                    $(".doc-relac-body").slideUp(800);
                    $(".doc-relac-title").removeClass("is-active");
                }
        
                $this.toggleClass("is-active");
                $this.next().slideToggle();
            });
        }
    }
  }