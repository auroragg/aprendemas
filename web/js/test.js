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
            // RECOGER EN UNA VARIABLE TODOS LOS CHECKS
            checks=$(":radio:checked");
            $.each( checks, function(key, value) {
                //alert(key + "=" + value.id);
                $.post('index.php?r=respuestas/correcta&id_respuesta=' + value.id, function(data) {
                    correcto = jQuery.parseJSON(data);
                    $.post('index.php?r=resultados/crear&id_sesion_apartado=' + ses_apart.id_sesion_apartado + '&id_pregunta=' + value.name + '&id_respuesta=' + value.id + '&correcto=' + correcto, function(data) {
                            resultado = jQuer.parseJSON(data);

                    });
                });
            });
        });

            //alert(checks.length);
            // RECORRER LOS CHECKS Y CREAR UN ARRAY CON DOS VALORES [ID_PREGUNTA, ID_RESPUESTA]
                // POR POST TENEMOS QUE LLAMAR AL CONTROLADOR RESPUESTAS Y PREGUNTARLE SI EL ID_RESPUESTA ES correcta
                    // crear un resusltado por cada check
            // FIN RECORRER






        window.opener.document.getElementById("nota").innerHTML = "10";
    });
});
