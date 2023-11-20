const btnagregar = document.getElementById("cuenta"),
      btncancelar = document.getElementById("Cancelar")
      btntrans = document.getElementById("trans"),
      frmagregar = document.querySelector(".nuevaC"),
      frmtrans = document.querySelector(".trans");
    
btnagregar.addEventListener("click", e => {
    frmagregar.classList.remove("hide");
})

btncancelar.addEventListener("click", e =>{
    frmagregar.classList.add("hide");
    frmtrans.classList.add("hide");
})

btntrans.addEventListener("click", e => {
   
    frmtrans.classList.remove("hide");
})


