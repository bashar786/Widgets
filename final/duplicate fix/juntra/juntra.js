const widgetJuntra = (el) => {
  return {
      init() {
        const presidentsListMore = el.find('.presidents__list-more');
        presidentsListMore.click(function() {
          const presidentsHidedRows = el.find('.presidents__list-row.hide');
          
          presidentsHidedRows.each((i, el) => {
            if (i < 3)
              jQuery(el).removeClass('hide');
          });
          if (el.find('.presidents__list-row.hide').length < 3)
            presidentsListMore.hide();
        });

        const addClassAfterFour = el.find('.presidents__list-row').length
      
        if (addClassAfterFour > 2) {
          jQuery( ".presidents__list-row:nth-child(n + 4)" ).addClass("hide");
        }
      }
  }
}