$(document).ready(function(){
    $("#corregir").click(function(){
        // COGER EN UNA VARIABLE EL ID_SESION

        id_sesion = $("#corregir").attr('data-sesion');
        id_apartado = $("#corregir").attr('data-apartado');
        //window.location.assign("index.php?=sesionesapartados/crear&id_sesion=" + id_sesion + "&id_apartado=" + id_apartado);
        //alert(id_apartado);
        //ajax para llamar a seseionesApartados/crear
        $.post('index.php?r=sesionesapartados/crear&id_sesion=' + id_sesion + '&id_apartado=' + id_apartado, function(data) {
            ses_apart = jQuery.parseJSON(data);
        });


            // RECOGER EN UNA VARIABLE TODOS LOS CHECKS
            // RECORRER LOS CHECKS Y CREAR UN ARRAY CON DOS VALORES [ID_PREGUNTA, ID_RESPUESTA]
                // POR POST TENEMOS QUE LLAMAR AL CONTROLADOR RESPUESTAS Y PREGUNTARLE SI EL ID_RESPUESTA ES correcta
                    // crear un resusltado por cada check
            // FIN RECORRER






        window.opener.document.getElementById("nota").innerHTML = "10";
    });
});
