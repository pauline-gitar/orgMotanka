


$(function() {

    // 1. Une requète ajax simple
    $.ajax('https://ipapi.co/json/').done(function(data) {

        console.log( data );
        console.log( data.city );

    });

    // 2. getJSON
    $.getJSON('https://ipapi.co/json/', function(data) {



        // Avec prependTo :
        $(`
                <h2>Bonjour et bienvenue sur notre site</h2>
                <p>
                    Vous êtes localiser à ${data.city}, ${data.region}.
                </p>
                <p> Connectez-vous pour accéder à votre compte.</p>
            `).prependTo('.welcomeApi');

    });

});
