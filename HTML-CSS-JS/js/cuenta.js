
var generador = document.querySelector(".cheques"); // Importante esto, guardar en una variable el div donde se crearan los cheques



//var e = 0;
var cuentasUser = 0;
var cuentas = 0;
var str = ""; // Es necesario iniciar la variable desde antes, si no dara error. Es la variable donde se guardara los divs creados

function recibirNumeroCuentas(cuentas){
  e = cuentas;
}

function dibujarCheques() {
    
    generador.innerHTML = ''; // Esto solo limpia el div de cheques 
    str = ''; // Reinicia el contador
    for (var i = 0; i < e; i++)
        {

            str +=  '<div class="crear">'+ // Aqui recalcar mas que todo que tengas cuidado con las comillas, porque son importantes, solo segui este ejemplo al tu crear los cheques
            '<div> <b>Cuenta #'+(i+1)+'</b></div>'+            // Como ves, es como si estuviera en la parte de HTML pero desde el javascript, podes colocar clases y todo lo que queras pero entre comillas.
            '<div>'+nombresCuenta[i]+'</div>'+
            '</div>';

        }
    generador.innerHTML = str; // Con esto llamo a la variable que itere antes, y con el innerHTML las voy generando en el html 
  
  
  }


  
  //Esta es la función que ejecuta todo
  document.addEventListener('DOMContentLoaded', function() {
    // Llamar a la función al cargar la página
    recibirNumeroCuentas(totalCuentas);
    dibujarCheques();

    //CÓDIGO PARA OBTENER LOS DATOS DE LA CUENTA

    //Con este obtenemos los nombres
    console.log(nombresCuenta);

    // Puedes usar nombresCuenta en tu lógica de JavaScript
    // Por ejemplo, aquí se muestra cómo iterar sobre los nombres de cuenta
      nombresCuenta.forEach(function(nombre) {
        console.log(nombre);
        // Aquí puedes agregar lógica para utilizar cada nombre de cuenta
        // Por ejemplo, puedes usarlos para generar elementos en el DOM
        // o realizar otras operaciones en el lado del cliente.
    });                               

});