const widgetFooter = (el) => {
    return {
        init() {
            el.find('#feedback_form_btn').click(function (e) {
                e.preventDefault();
                nonce = jQuery('.feedback-form input[name="nonce"]').val();
                email = jQuery('.feedback-form input[name="email"]').val();
                ajax_url = jQuery('.feedback-form input[name="feedback-form-access"]').val();
                var $loading = jQuery('#cabei-spinner').hide();
                jQuery(document)
                    .ajaxStart(function () {
                        $loading.show();
                    })
                    .ajaxStop(function () {
                        $loading.hide();
                    });

                jQuery.ajax({
                    url: ajax_url,
                    data: { action: "mailchimp_nonce", nonce: nonce, email: email },
                    type: 'POST',

                    success: function (data) {
                        if (data) {
                            jQuery('.display_message').text(data);
                            jQuery(".display_message:contains('successfully')").css("color", "green");
                        }
                    }
                });
            });
        }
    }
}

// jQuery('#cabei-spinner').hide()  // Hide it initially
 