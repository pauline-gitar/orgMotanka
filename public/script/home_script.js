
// -- Initialisation de jQuery
$(function(){

    Date.prototype.ddmmyyyy = function() {
        var yyyy = this.getFullYear().toString();
        var mm = (this.getMonth()+1).toString();
        var dd  = this.getDate().toString();
        return (dd[1]?dd:"0"+dd[0]) + "/" + (mm[1]?mm:"0"+mm[0]) + "/" + yyyy; // padding
    };

    var date = new Date();
    console.log( date.ddmmyyyy() ); // affichage console
    $('#date').append('Nous somme le ' + date.ddmmyyyy());

});
