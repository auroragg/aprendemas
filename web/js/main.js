
var id_apartado;
$(document).ready(function(){
    $("#test").click(function(){
        //creación dinámica del progress bar
        //$(".puntuacion_apart").append("<div id='nota' class='my-progress-bar'></div>");
        //Crear ventana para el test
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
    //animación de las banderas
    // $(".banderas").hover(function(){
    //     id_bandera = $(this).attr('id');
    //     $("#"+id_bandera+"").animate({width:'100px'}, "slow");
    // }, function(){
    //     $("#"+id_bandera+"").animate({width:'64px'}, "slow");
    // });

    //validacion del campo alias, lo hago con expresión regular, tiene que tener
    //minimo 5 letras y un max de 12 y puede tener o no hasta 4 dígitos.
    $("#nombre").after("<p id='info'></p>");
    $("#info").addClass("infoReg");
    $("#nombre").on("blur", function(){
        //pattern ="^([a-z]+[0-9]{0,4}){5,12}$"
        var nomForm = document.getElementById('nombre').value;
        if (/^([a-z]+[0-9]{0,4}){5,12}$/.test(nomForm)) {
            $("#info").text("Cumple los requisitos");
        }else {
            $("#info").text("Debe tener 5 a 12 letras y puede tener hasta 4 dígitos.  Ejemplo: aurora23");
        }

    });

    //local storage
    $('#login-button').click(function(){
        /*Captura de datos escrito en el input*/
        var nom = document.getElementById("login");
        var pass = document.getElementById("pass");
        /*Guardando el dato en el LocalStorage*/
        localStorage.setItem("nom", nom.value);
        localStorage.setItem("pass", pass.value);
        /*Limpia el input*/
        //document.getElementById("nombre").value = "";
        var storedNom = localStorage.getItem('nom');
        var storedPw = localStorage.getItem('pass');
        if (nom.value == storedNom){
            alert(storedPw);
            document.getElementById("pass").innerHTML = storedPw;
        }
    });


    //cuando hago click en el boton empezar cuando estamos en SiteController/about
    $("#empezar").on("click", function() {
        window.location.href = "/index.php";
    });


});




function obtenerId(){
    $(".apartado").click(function(){
        id_apartado = $(this).attr("id");
        return id_apartado;
    });
}
