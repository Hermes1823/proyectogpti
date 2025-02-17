const $categoria= document.getElementById("categoria");
let myChart;
// Eventos
$categoria.addEventListener("change",filtradoCategoria)
document.addEventListener('DOMContentLoaded', graficoBarras);

//Funciones
function graficoBarras() {

       // Destruir el gráfico anterior si existe
       if (myChart) {
        myChart.destroy();
    }
    const grafico = document.getElementById('productos');
    caracteristicas = {
        type: 'bar',
        data: {
            labels: etiquetas,
            datasets: [{
                label: "#Cantidad de productos",
                data: cantidades,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };
   myChart= new Chart(grafico, caracteristicas);
}

function filtradoCategoria(event){
const id_categoria= event.target.value;
const productos_filtrados= RESULTADOS.filter((a=>a.id_categoria==id_categoria));
if(productos_filtrados.length>0){
    if (myChart) {
        myChart.destroy();
    }
    const etiquetas= productos_filtrados.map((a)=>a.descripcion);
    const cantidades= productos_filtrados.map((a)=>a.cantidad);
    const grafico = document.getElementById('productos');
    caracteristicas = {
        type: 'bar',
        data: {
            labels: etiquetas,
            datasets: [{
                label: "#Cantidad de productos",
                data: cantidades,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };
    myChart=new Chart(grafico, caracteristicas);
    Swal.fire({
        title: "Generacion exitosa!",
        text: "Grafico generado",
        icon: "success"
      });
}else{
    Swal.fire({
        title: "Advertencia!",
        text: "Categoria sin productos",
        icon: "info"
      });
}
}
