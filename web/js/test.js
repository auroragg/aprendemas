$(document).ready(function(){
    $("#corregir").click(function(){

        // COGER EN UNA VARIABLE EL ID_SESION

        id_sesion = $("#corregir").attr('data-sesion');
        id_apartado = $("#corregir").attr('data-apartado');
        //window.location.assign("index.php?=sesionesapartados/crear&id_sesion=" + id_sesion + "&id_apartado=" + id_apartado);
        //alert(id_apartado);
        //ajax para llamar a seseionesApartados/crear
        $.get('index.php?r=sesionesapartados/crear&id_sesion=' + id_sesion + '&id_apartado=' + id_apartado, function(data) {
            ses_apart = jQuery.parseJSON(data);
            // RECOGER EN UNA VARIABLE TODOS LOS CHECKS
            checks=$(":radio:checked");
            verd = 0;
            $.each( checks, function(key, value) {
                //alert(key + "=" + value.id);
                $.get('index.php?r=respuestas/correcta&id_respuesta=' + value.id, function(data) {
                    correcto = jQuery.parseJSON(data);
                    if (correcto) verd++;
                    $.get('index.php?r=resultados/crear&id_sesion_apartado=' + ses_apart.id_sesion_apartado + '&id_pregunta=' + value.name + '&id_respuesta=' + value.id + '&correcto=' + correcto, function(data) {
                            resultado = jQuery.parseJSON(data);

                    });
                }).done (function() {

                    var progress_circle = $(window.opener.document).find(".my-progress-bar").circularProgress({
                    // options here
                        color: "#04B431",
                        width: "200px",
                        height: "200px",
                        percent: verd*100/checks.length,
                        text: 'Nota'
                    });
                    window.close();
                });
            });
        });
            //alert(checks.length);
            // RECORRER LOS CHECKS Y CREAR UN ARRAY CON DOS VALORES [ID_PREGUNTA, ID_RESPUESTA]
                // POR POST TENEMOS QUE LLAMAR AL CONTROLADOR RESPUESTAS Y PREGUNTARLE SI EL ID_RESPUESTA ES correcta
                    // crear un resusltado por cada check
            // FIN RECORRER




        //window.opener.document.getElementById("nota").innerHTML = "10";
    });
});
