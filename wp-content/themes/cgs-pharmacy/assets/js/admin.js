jQuery(document).ready(function(){
    jQuery(document).on('click', '#get_started', function(e) {
        e.preventDefault();
        jQuery('.loading').show();
        jQuery('#get_started').hide();
        jQuery.ajax({
            url : ajaxurl,
            type : 'post',
            data : {
                action : 'get_started_import_site',
            },
            success : function( response ) {
                console.log('Success: '+JSON.stringify(response));
                redirect_uri = window.location.href;
                window.location.href = redirect_uri;
            },
            error: function(response) {
                console.log('Error: '+JSON.stringify(response));
            }
        });
    });
});
