var generador = document.querySelector(".id_cuentas"); // Importante esto, guardar en una variable el div donde se crearan los cheques



//var e = 0;
var cuentasUser = 0;
var cuentas = 0;
var str = ""; // Es necesario iniciar la variable desde antes, si no dara error. Es la variable donde se guardara los divs creados
var cuentasGuardadas = [];

function recibirNumeroCuentas(cuentas){
  e = cuentas;
}

function dibujarComboBox(cuentasGuardadas) {
    generador.innerHTML = ''; // Esto solo limpia el div de cheques 
    str = ''; // Reinicia el contador
    for (var i = 0; i < e; i++) {
        str +=  '<option value="'+cuentasGuardadas[i].id_cuenta+'">'+cuentasGuardadas[i].nombre_cuenta+'</option>';
    }
    generador.innerHTML = str; // Con esto llamo a la variable que itere antes, y con el innerHTML las voy generando en el html 
}



  
  //Esta es la función que ejecuta todo
  document.addEventListener('DOMContentLoaded', function() {
    // Llamar a la función al cargar la página
    recibirNumeroCuentas(totalCuentas);
  

    //CÓDIGO PARA OBTENER LOS DATOS DE LA CUENTA

    //Con este obtenemos los nombres
    console.log(nombresCuenta);

    // Puedes usar nombresCuenta en tu lógica de JavaScript
    // Por ejemplo, aquí se muestra cómo iterar sobre los nombres de cuenta
    
    // Convertir el JSON a un objeto JavaScript
    

      nombresCuenta.forEach(function(nombre) {
        cuentasGuardadas.push(nombresCuenta);
        
        

        // Aquí puedes agregar lógica para utilizar cada nombre de cuenta
        // Por ejemplo, puedes usarlos para generar elementos en el DOM
        // o realizar otras operaciones en el lado del cliente.
    }); 
    
    let datosObjeto = (nombresCuenta);
    console.log("ARRAY DE CUENTAS", datosObjeto);
    dibujarComboBox(datosObjeto);

});

