class DetallesVenta {
    codigo_producto = 0;
    nombre_producto = "NNP";
    cantidad = 0;
    precio = 0.0;
    importe = 0.0;

    constructor(codigo_producto, nombre_producto, cantidad, precio) {
        this.cantidad = parseInt(cantidad);
        this.nombre_producto = nombre_producto;
        this.codigo_producto = parseInt(codigo_producto);
        this.precio = precio;
        this.calcularImporte();
    }

    setCodigo(codigo_producto) {
        this.codigo_producto = codigo_producto;
    }

    setNombre(nombre_producto) {
        this.nombre_producto = nombre_producto;
    }

    setCantidad(cantidad) {
        this.cantidad = cantidad;
    }

    setPrecio(precio) {
        this.precio = precio;
    }

    getCodigo() {
        return this.codigo_producto;
    }

    getNombre() {
        return this.nombre_producto;
    }

    getCantidad() {
        return this.cantidad;
    }

    getPrecio() {
        return this.precio;
    }

    calcularImporte() {
        this.importe = this.cantidad * this.precio;
    }
}
// -------- Variables
let detalles = [];
const tabla = document.getElementById("cuerpo_tabla");
const listaProductos = document.getElementById("listaProductos");
const btnAgregarProducto = document.getElementById("btnAgregarProducto");
const btnAgregarOrden = document.getElementById("brnAgregarOrden");
const inputCantidad = document.getElementById("cantidad");
const txtTotal = document.getElementById("txtTotal");
const txtTotal_ = document.getElementById("txtTotal_");
const inputDetalles = document.getElementById("detalles_venta");
const form_venta = document.getElementById("formulario_venta");
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    }
  });
//
btnAgregarOrden.setAttribute("disabled", true);
// -----------Eventos----------------------------------
btnAgregarProducto.addEventListener("click", (e) => {
    e.preventDefault();

});
btnAgregarOrden.addEventListener("click", (e) => {

    inputDetalles.value = JSON.stringify(detalles);

});
document.addEventListener("DOMContentLoaded", () => {
    // Capturar la hora de inicio
    const horaInicio = new Date();
    document.getElementById("hora_inicio").value = horaInicio.toISOString();
});

listaProductos.addEventListener("change", calcularPrecioImporte);
inputCantidad.addEventListener("input", actualizarPrecioImporte);
tabla.addEventListener("input", actualizarDetalle);
//----------------------------------------------
// btnAgregarOrden.addEventListener("onclick",rellenarTabla);
function actualizarDetalle(event) {
    fila=event.target.closest("tr");
    const inputCantidad=fila.querySelector('input[name="cnt"]');
    const inputPrecio=fila.querySelector('input[name="pu"]');
    const inputImporte=fila.querySelector('input[name="imp"]');
    id_producto=fila.dataset.id;
    const cantidad = parseFloat(inputCantidad.value) || 0;
    const precio = parseFloat(inputPrecio.value) || 0;
    const importe = cantidad * precio;
    inputImporte.value = importe.toFixed(2); // Mostrar con 2 decimales
    let producto = PRODUCTOS.find((d) => {
        return d.id_producto ==id_producto;
    })
if(cantidad>producto.cantidad){
Toast.fire({
    icon:"error",
    title:"Cantidad no permitida"
});
inputCantidad.value=producto.cantidad;

respuesta = detalles.findIndex(
    (d) => d.codigo_producto == id_producto
);
detalles[respuesta].cantidad=cantidad;
detalles[respuesta].importe=importe;
detalles[respuesta].precio=precio;
//
calcularTotal();
}else{

    respuesta = detalles.findIndex(
        (d) => d.codigo_producto == id_producto
    );
    detalles[respuesta].cantidad=cantidad;
    detalles[respuesta].importe=importe;
    detalles[respuesta].precio=precio;
    //
    calcularTotal();

}


}
function rellenarTabla() {
    codigo = listaProductos.options[listaProductos.selectedIndex].value;
    nombre = listaProductos.options[listaProductos.selectedIndex].text;
    cantidad = document.getElementById("cantidad").value;
    precio = document.getElementById("precio").value;
    importe = document.getElementById("importe");
    const lineaVenta = new DetallesVenta(codigo, nombre, cantidad, precio);

    if (insertarDatos(lineaVenta)) {
        const fila = document.createElement("tr");
        fila.setAttribute("data-id", lineaVenta.codigo_producto);
        const columna_borrar = document.createElement("td");
        const icono_borrar = document.createElement("i");
        icono_borrar.setAttribute("class", "fas fa-trash ");
        icono_borrar.addEventListener("click", borrarFila);
        ////////////////

        columna_borrar.appendChild(icono_borrar);
        const columnas =
            `



        <td>${lineaVenta.nombre_producto}</td>
        <td>
                               <input type="number" class="form-control" name="cnt" value="${lineaVenta.cantidad}">
        </td>
        <td>
        <input type="number" class="form-control" name="pu" step="0.01" value="${lineaVenta.precio}" disabled>
        </td>
        <td>
          <input type="number" class="form-control" name="imp" step="0.01" value="${lineaVenta.importe}" disabled>
        </td>
    `;
        fila.innerHTML = columnas;
        fila.appendChild(columna_borrar);
        tabla.appendChild(fila);

        ///
        limpiarDatos();
        calcularTotal();
        Swal.fire({
            title: "Exitoso",
            text: "Producto agregado a la venta",
            icon: "success",
            timer: 1500,
        });
    } else {
        Swal.fire({
            title: "Error",
            text: "Ingresar una cantidad mayor a '0' al producto vendido o la cantidad pedida excede lo que se tiene en el almacen",
            icon: "error",
            timer: 1500,
        });
    }
}

function insertarDatos(lineaVenta) {
    let respuesta;
    if (
        lineaVenta.cantidad > 0 &&
        lineaVenta.precio > 0 &&
        lineaVenta.cantidad != null &&
        lineaVenta.precio != null &&
        lineaVenta.cantidad != undefined &&
        lineaVenta.precio != undefined
    ) {
        let producto = PRODUCTOS.find((d) => {
            return d.id_producto == lineaVenta.codigo_producto;
        })
        if (producto.cantidad >= lineaVenta.cantidad) {
            //Reemplaza un producto ya ingresado
            respuesta = detalles.findIndex(
                (d) => d.codigo_producto == lineaVenta.codigo_producto
            );
            if (respuesta != -1) {
                detalles[respuesta] = lineaVenta;
                tabla.querySelector(`tr[data-id="${lineaVenta.codigo_producto}"]`).remove();
            } else {
                detalles.push(lineaVenta);
            }
            return true;
        } else {
            return false
        }

    } else {
        return false;
    }
}

function calcularPrecioImporte(event) {
    cantidad = document.getElementById("cantidad");
    precio = document.getElementById("precio");
    importe = document.getElementById("importe");
    p =
        event.target.options[event.target.selectedIndex].attributes[
            "data-precio"
        ].value;
    precio.value = p;
    importe.value = precio.value * cantidad.value;
}

function actualizarPrecioImporte(event) {
    let precio = document.getElementById("precio");
    let importe = document.getElementById("importe");

    importe.value = precio.value * event.target.value;
}
function borrarFila(event) {
    Swal.fire({
        title: "¿Estas seguro de borrar este detalle?",
        showDenyButton: true,
        confirmButtonText: "Borrar",
        denyButtonText: `Cancelar`
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Producto borrado", "", "success");
            const fila = event.target.closest("tr");
            const id = fila.dataset.id;

            fila.remove();
            detalles = detalles.filter((d) => {
                return d.codigo_producto != id;
            });
            calcularTotal();
        } else {
            Swal.fire("Borrado cancelado", "", "info");
        }
    });


}

// function borrarTabla() {}

function limpiarDatos() {
    document.getElementById("cantidad").value = 0;
    document.getElementById("precio").value = 0;
    document.getElementById("importe").value = 0;
}

function calcularTotal() {
    let total = 0.0;
    detalles.forEach((d) => {
        total = total + d.importe;
    });
    txtTotal.value = total;
    txtTotal_.value = total;

    if (detalles.length > 0 && btnAgregarOrden.hasAttribute("disabled")) {
        btnAgregarOrden.removeAttribute("disabled");
    } else if (detalles.length == 0) {
        btnAgregarOrden.setAttribute("disabled", true);
    }

}
