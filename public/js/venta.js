class DetallesVenta {
    codigo_producto = 0;
    nombre_producto = "NNP";
    cantidad = 0;
    precio = 0.0;
    importe = 0.0;

    constructor(codigo_producto, nombre_producto, cantidad, precio) {
        this.cantidad = cantidad;
        this.nombre_producto = nombre_producto;
        this.codigo_producto = codigo_producto;
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
let html;
let tabla = document.getElementById("cuerpo_tabla");
let listaProductos = document.getElementById("listaProductos");
let btnAgregarProducto = document.getElementById("btnAgregarProducto");
let btnAgregarOrden = document.getElementById("btnAgregarOrden");
let inputCantidad = document.getElementById("cantidad");
let txtTotal = document.getElementById("txtTotal");
let txtTotal_ = document.getElementById("txtTotal_");

// -----------Eventos----------------------------------
btnAgregarProducto.addEventListener("click", (e) => {
    e.preventDefault();
});

listaProductos.addEventListener("change", calcularPrecioImporte);
inputCantidad.addEventListener("input", actualizarPrecioImporte);
//----------------------------------------------
// btnAgregarOrden.addEventListener("onclick",rellenarTabla);

function rellenarTabla() {
    codigo = listaProductos.options[listaProductos.selectedIndex].value;
    nombre = listaProductos.options[listaProductos.selectedIndex].text;
    cantidad = document.getElementById("cantidad").value;
    precio = document.getElementById("precio").value;
    importe = document.getElementById("importe");
    lineaVenta = new DetallesVenta(codigo, nombre, cantidad, precio);
    html = ``;

    if (insertarDatos(lineaVenta)) {
        detalles.forEach((d) => {
            html =
                html +
                `<tr>

            <td>
            <input name="productos[]" type="hidden" value="${d.codigo_producto}">
            ${d.nombre_producto}
            </td>
            <td>
                <input name="cantidades[]" type="hidden" class="form-control"  value="${d.cantidad}" >
                <input  type="number" class="form-control"  value="${d.cantidad}" disabled=true >
            </td>
            <td>
                <input name="precios[]" type="hidden" class="form-control" value="${d.precio} " >
                <input  type="number" class="form-control" value="${d.precio}" disabled=true >
            </td>

            <td>

                <input  type="number" class="form-control" type="text" value="${d.importe}" disabled=true >
            </td>
            </tr>`;
        });

        tabla.innerHTML = html;
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
            text: "Ingresar una cantidad mayor a '0' al producto vendido",
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
        //Reemplaza un producto ya ingresado
        respuesta = detalles.findIndex(
            (d) => d.codigo_producto == lineaVenta.codigo_producto
        );
        if (respuesta != -1) {
            detalles[respuesta] = lineaVenta;
        } else {
            detalles.push(lineaVenta);
        }
        return true;
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
// function borrarFila() {}

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
}
