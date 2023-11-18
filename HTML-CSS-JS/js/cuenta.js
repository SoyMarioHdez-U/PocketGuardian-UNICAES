
var generador = document.querySelector(".cheques"); // Importante esto, guardar en una variable el div donde se crearan los cheques



var ult_ingreso = 0;
var ult_egreso = 0;
var balance = 0.00;
var usuario = "Nombre de usuario";
var nom_cuenta = "Billetera "
var str = ""; // Es necesario iniciar la variable desde antes, si no dara error. Es la variable donde se guardara los divs creados
var totalCuentas = 0;



function obtenerValorDelInput() {
    
    
    generador.innerHTML = ''; // Esto solo limpia el div de cheques 
    str = ''; // Reinicia el contador
    for (var i = 0; i < e; i++)
        {

            str +=  '<div class="crear">'+ // Aqui recalcar mas que todo que tengas cuidado con las comillas, porque son importantes, solo segui este ejemplo al tu crear los cheques
            '<div>Cuenta: '+nom_cuenta+(i+1)+'</div>'+            // Como ves, es como si estuviera en la parte de HTML pero desde el javascript, podes colocar clases y todo lo que queras pero entre comillas.
            '<div> Saldo: $'+ balance+'</div>'+
            '<div>Último ingreso: '+ult_ingreso+'</div>'+
            '<div>Último ingreso: '+ult_egreso+'</div>'+
            '</div>';

        }
    generador.innerHTML = str; // Con esto llamo a la variable que itere antes, y con el innerHTML las voy generando en el html 
  
  
  }

function obtenerValorDelInput2() {
    
    
    // Obtener el elemento input por su ID
    var inputElement = document.getElementById("miInput");
  
    // Obtener el valor del input
    var valor = inputElement.value;
    e = valor;
  

  }