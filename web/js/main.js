//Crear ventana para el test
var id_apartado;
$(document).ready(function(){
    $("#test").click(function(){
        id_apartado = window.location.search.substring(25);
        var alto = 400;
        var ancho= 800;
        //calculamos la posición para centrar
        var y = parseInt((window.screen.heigth/2)- (alto/2));
        var x = parseInt((window.screen.width/2)- (ancho/2));

        //creamos la nueva ventana centrada
        var newWindow = window.open("/index.php?r=apartados/test&id="+id_apartado,"","width="+ancho+", heigth="+alto+", top="+y+",left="+x+"scrollbars=yes");

    });


});
function obtenerId(){
    $(".apartado").click(function(){
        id_apartado = $(this).attr("id");
        return id_apartado;
    });
}
