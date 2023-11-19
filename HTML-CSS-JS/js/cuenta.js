
var generador = document.querySelector(".cheques"); // Importante esto, guardar en una variable el div donde se crearan los cheques



//var e = 0;
var cuentasUser = 0;
var cuentas = 0;
var usuario = "Cuenta infantil";
var str = ""; // Es necesario iniciar la variable desde antes, si no dara error. Es la variable donde se guardara los divs creados

function recibirNumeroCuentas(cuentas){
  e = cuentas;
}

function obtenerValorDelInput() {
    
    generador.innerHTML = ''; // Esto solo limpia el div de cheques 
    str = ''; // Reinicia el contador
    for (var i = 0; i < e; i++)
        {

            str +=  '<div class="crear">'+ // Aqui recalcar mas que todo que tengas cuidado con las comillas, porque son importantes, solo segui este ejemplo al tu crear los cheques
            '<div> Cuenta #'+(i+1)+'</div>'+            // Como ves, es como si estuviera en la parte de HTML pero desde el javascript, podes colocar clases y todo lo que queras pero entre comillas.
            '<div> Hola </div>'+
            '<div>'+usuario+'</div>'+
            '</div>';

        }
    generador.innerHTML = str; // Con esto llamo a la variable que itere antes, y con el innerHTML las voy generando en el html 
  
  
  }


  

  document.addEventListener('DOMContentLoaded', function() {
    // Llamar a la función al cargar la página
    recibirNumeroCuentas(totalCuentas);
    obtenerValorDelInput();
});
