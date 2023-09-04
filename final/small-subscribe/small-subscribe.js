const widgetSmallSubscribe = (el) => {
    return {
        init() {

            jQuery('#cabei-spinner').hide()  // Hide it initially

            jQuery(function () {
                nonce = jQuery('.feedback-form input[name="nonce"]').val();
                email = jQuery('.feedback-form input[name="email"]').val();


                jQuery("form").submit(function (event) {
                    event.preventDefault();

                    //get the form data
                    var formData = {
                        ajax_url : jQuery('.feedback-form-subscribe input[name="feedback-form-access"]').val(),
                        email: jQuery("input[name=email]").val()
                    };
                    var $loading = jQuery('#cabei-spinner-subscribe').hide();
                    jQuery(document)
                        .ajaxStart(function () {
                            $loading.show();
                        })
                        .ajaxStop(function () {
                            $loading.hide();
                        });


                    jQuery.ajax({
                        type: "POST",
                        url: "//jsonplaceholder.typicode.com/posts",
                        data: formData,
                        dataType: "json",
                        encode: true
                    }).done(function (data) {
                        jQuery('.display_message-subscribe').html('Subscribed successfully.');
                    });
                });
            });
        }
    }
}