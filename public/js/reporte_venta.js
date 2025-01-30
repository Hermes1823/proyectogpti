document.getElementById("btn_filtrado").addEventListener("click", function(event) {
    event.preventDefault(); // Evita que el formulario recargue la página
console.log("shdb")
    let anioInicio = document.getElementById("anioInicio").value;
    let anioFin = document.getElementById("anioFin").value;
    // let mensajeDiv = document.getElementById("mensaje");
    let ctx = document.getElementById("ventasChart").getContext("2d");

    // URL de la API (reemplázala con la URL real de tu servidor)
    let apiUrl = `api/reporteVenta/${anioInicio}/${anioFin}`;

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            // if (!data.success) {
            //     mensajeDiv.innerHTML = `<p style="color: red;">${data.message}</p>`;
            //     return;
            // }
console.log(data)
            let ventas = data.data;

            // Extraer nombres de los meses y los totales vendidos
            let meses = ventas.map(v => v.Mes);
            let totales = ventas.map(v => v.Total);

            // Destruir gráfico previo si existe
            if (window.myChart) {
                window.myChart.destroy();
            }

            // Crear nuevo gráfico con Chart.js
            window.myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: meses,
                    datasets: [{
                        label: "Total Vendido",
                        data: totales,
                        backgroundColor: "rgba(54, 162, 235, 0.5)",
                        borderColor: "rgba(54, 162, 235, 1)",
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        })
        .catch(error => {
            console.error("Error:", error);
        });
});
