const btnagregar = document.getElementById("cuenta"),
      btntrans = document.getElementById("trans"),
      frmagregar = document.querySelector(".nuevaC"),
      frmtrans = document.querySelector(".trans");
    
btnagregar.addEventListener("click", e => {
    frmagregar.classList.remove("hide");
    frmtrans.classList.add("hide");
});

btntrans.addEventListener("click", e => {
    frmagregar.classList.add("hide");
    frmtrans.classList.remove("hide");
});
document.addEventListener("DOMContentLoaded", function () {
    const floatmenu = document.getElementById("floatmenu");
    const mainIcon = document.getElementById("mainIcon");
    const cuentaIcon = document.getElementById("cuentaIcon");
    const transaccionIcon = document.getElementById("transaccionIcon");

    mainIcon.addEventListener("click", function () {
        // Add functionality for the main icon click
        console.log("Main icon clicked");
    });

    cuentaIcon.addEventListener("click", function () {
        // Add functionality for the "Cuenta" icon click
        console.log("Cuenta icon clicked");
    });

    transaccionIcon.addEventListener("click", function () {
        // Add functionality for the "Transaccion" icon click
        console.log("Transaccion icon clicked");
    });
});
