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

