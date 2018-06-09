//Crear ventana para el test
var id_apartado;
$(document).ready(function(){
    $("#test").click(function(){
        id_apartado = $("#test").attr('data-apartado');
        id_sesion = $("#test").attr('data-sesion');
        var alto = 400;
        var ancho= 800;
        //calculamos la posición para centrar
        var y = parseInt((window.screen.heigth/2)- (alto/2));
        var x = parseInt((window.screen.width/2)- (ancho/2));

        //creamos la nueva ventana centrada
        var newWindow = window.open("/index.php?r=apartados/test&id="+id_apartado+"&id_sesion="+id_sesion,"","width="+ancho+", heigth="+alto+", top="+y+",left="+x+"scrollbars=yes");

    });

    $(".banderas").hover(function(){
        id_bandera = $(this).attr('id');
        $("#"+id_bandera+"").animate({width:'100px'}, "slow");
    }, function(){
        $("#"+id_bandera+"").animate({width:'64px'}, "slow");
    });
});




function obtenerId(){
    $(".apartado").click(function(){
        id_apartado = $(this).attr("id");
        return id_apartado;
    });
}
