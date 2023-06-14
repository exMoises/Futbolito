$(document).ready(function() {
    $( "#btnAgregarJugadorFutbol" ).on( "click", function() {
        $('#modalagregarhorario').modal('show');
    });

    $("#actualizarUsuario").on( "click", function() {
        $('#modalactualizarJugador').modal('show');
    });
});