// Crear el objeto usuario
let usuario = {
    nombre: 'John',
    apellido: 'Doe',
    cuentas: {
      nombre: 'Cuenta principal',
      transacciones: [
        {
          monto: 100.00,
          descripción: 'Compra en línea',
          fecha: '2023-11-14'
        },
        {
          monto: -50.00,
          descripción: 'Retiro de efectivo',
          fecha: '2023-11-15'
        }
      ]
    }
  };
  
  // Acceder a las propiedades del objeto usuario
  console.log(`Nombre: ${usuario.nombre}`);
  console.log(`Apellido: ${usuario.apellido}`);
  console.log(`Cuenta: ${usuario.cuentas.nombre}`);
  
  // Iterar sobre las transacciones
  console.log('Transacciones:');
  usuario.cuentas.transacciones.forEach(transaccion => {
    console.log(`- Monto: ${transaccion.monto}, Descripción: ${transaccion.descripción}, Fecha: ${transaccion.fecha}`);
  });
  