$(function(){
    $('form[name="formlogin"]').submit(function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.post($(this).attr('action'), data, function(html){
            if( html.trim() === ''){
                window.location.reload();
                return;
            }
            $('#connexion .modal-body').html(html);

        });
    });
});