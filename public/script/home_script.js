

// -- Initialisation de jQuery
$(function(){


    // definir l'élément/bouton
    $btn_hamburger = $('.btn_hamburger');
    $btn_toogle = $('#btn_toogle');

    // 1. ecouter l'evenement sur le bouton
    $btn_hamburger.click(function() {
        $btn_toogle.toggle(300);
    });



});
