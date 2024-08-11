$(document).ready(function(){

    $(".share-btn a, .social-menu a").click(function(){
        var window_size = "width=585,height=511";
        var url = this.href;
        var domain = url.split("/")[2];
        switch(domain) {
            case "www.facebook.com":
                window_size = "width=585,height=368";
                break;
            case "www.twitter.com":
                window_size = "width=585,height=261";
                break;
            case "plus.google.com":
                window_size = "width=517,height=511";
                break;
        }
        window.open(url, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,' + window_size);
        return false;
    });
    
    $('#contact-form-new').submit(function(){
        var _this = $(this);
        
        $.ajax({
            type: 'POST',
            url: _this.attr('action'),
            data: 'ajax=submit&'+_this.serialize(),
            cache: false,
            processData: false,        
            beforeSend: function(){
                $('.error').html('');
            },
            success: function(data){
                var obj = ( typeof(data) != 'object' ) ? $.parseJSON(data) : data ;
                if( typeof(obj.errors) != "undefined" && obj.errors !== null )
                {  
                    $.each(obj.errors, function(i, val) {
                        $('#Contact_'+i).next().html(val);
                    });
                }
                else
                {
                    _this.hide();
                    $('#form-message').html(obj.content).css('color', 'green').show();
                    setTimeout(function(){
                        location.reload();
                    }, 3500); 
                }
            }
        });
        
        return false;
    });
    
});