// Variables
const btnAprobar = document.getElementById("btn_aprobar");
const btnRechazar = document.getElementById("btn_rechazar");
const lstProveedores = document.getElementById("listaProveedores");
const lstOrden = document.getElementById("listaOrdenes");
const tblCompra = document.getElementById("cuerpo_tabla");
const txtTotal = document.getElementById("txtTotal_");
const inptEstado = document.getElementById("estado");
const frmCompra = document.getElementById("formulario");
// Eventos
lstProveedores.addEventListener("change", mostrarOrdenes);
lstOrden.addEventListener("change", mostrarDetalles);
btnAprobar.addEventListener("click", aceptar);
btnRechazar.addEventListener("click", rechazar);
document.addEventListener("DOMContentLoaded", () => {
    // Capturar la hora de inicio
    const horaInicio = new Date();
    document.getElementById("hora_inicio").value = horaInicio.toISOString();
});
//Funciones inicializadas
deshabilitarBotones()

// Funciones
function aceptar(event) {
    event.preventDefault();
    inptEstado.value = "ACEPTADO";
    frmCompra.submit();
}

function rechazar(event) {

    event.preventDefault();
    inptEstado.value = "RECHAZADO";
    frmCompra.submit();
}
async function mostrarOrdenes(event) {
    const id_proveedor = lstProveedores.options[lstProveedores.selectedIndex].value;

    const data = await ApiOrdenesProveedor(id_proveedor);
    let elemento = null;
    txtTotal.value = "";
    tblCompra.innerHTML = "";
    console.log(data);
    if (data.success && data.data.length > 0) {

        lstOrden.innerHTML = "";
        data.data.forEach((e) => {
            lstOrden.innerHTML="<option >Seleccione la Orden</option>";
            elemento = document.createElement("option");
            elemento.setAttribute("value",e.id_orden_compra)
            elemento.innerHTML = `${e.id_orden_compra} - ${e.estado}`;
            lstOrden.appendChild(elemento);
        });
        console.log("Ordenes listadas pendientes");
        habilitarBotones()

    } else {
        const elemento = "<option >Sin Ordenes pendientes</option>";
        lstOrden.innerHTML = elemento;
        console.log("Sin ordenes causa")
        deshabilitarBotones()
    }

}

async function mostrarDetalles(event) {
    const id = lstOrden.options[lstOrden.selectedIndex].value;
    const data = await ApiMostrarDetalles(id);
    const detalles = await data.data.detalles;
    // console.log(detalles)
    if (data.success) {
        // console.log(data.data)
        habilitarBotones();
        txtTotal.value = data.data.total;
        detalles.forEach((d) => {
            let row = `
                <td>${d.producto.descripcion}</td>
               <td>${d.cantidad}</td>
               <td>${d.precio}</td>
                <td>${d.precio * d.cantidad}</td>

            `;
            let tr = document.createElement('tr'); // Crear el nodo <tr>
            tr.innerHTML = row; // Asignar el contenido HTML al <tr>
            tblCompra.appendChild(tr); // Agregar la fila a la tabla
        });
    } else {
        console.log("ERROR MIADO")
    }

}

function deshabilitarBotones() {
    btnAprobar.disabled = true;
    btnRechazar.disabled = true;

}

function habilitarBotones() {
    btnAprobar.disabled = false;
    btnRechazar.disabled = false;
}


async function ApiOrdenesProveedor(id) {
    const datos = await fetch(`http://127.0.0.1:8000/api/search_orden_proveedor/${id}`)
        .then((data) => data.json())
        .then((data) => data);
    return datos;
}

async function ApiMostrarDetalles(id) {
    const datos = await fetch(`http://127.0.0.1:8000/api/details_orden/${id}`)
        .then((data) => data.json())
        .then((data) => data);
    return datos;
}
