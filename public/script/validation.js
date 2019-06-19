$(function(){
    function parseLoginForm() {
        $('form[name="formlogin"]').submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();

            var xhr = new XMLHttpRequest();
            var action = $(this).attr('action');
            $.ajax({
                url: action,
                type: 'post',
                data: data,
                xhr: function() {
                    return xhr;
                },
                success:  function(html){
                    var url = xhr.responseURL;
                    if( url.indexOf( action) === -1){
                        window.location.href = url;
                        return;
                    }
                    $('#connexion .modal-body').html(html);
                    parseLoginForm();

                }
            });
        });

    }
});