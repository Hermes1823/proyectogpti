document.getElementById("btn_filtrado").addEventListener("click", function(event) {
    event.preventDefault(); // Evita que el formulario recargue la página

    let anioInicio = document.getElementById("anioInicio").value;
    let anioFin = document.getElementById("anioFin").value;
    let ctx = document.getElementById("ventasChart").getContext("2d");

    if (!anioInicio || !anioFin || anioInicio < 0 || anioFin < 0) {
        console.log("Por favor, ingresa años válidos.");
        return;
    }
    // URL de la API (reemplázala con la URL real de tu servidor)
    let apiUrl = `api/reporteVenta/${anioInicio}/${anioFin}`;

    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (!data.data || data.data.length === 0) {
                console.log("No hay datos para mostrar");
                return;
            }

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
            document.getElementById("mensajeError").innerText = "Ocurrió un error al cargar los datos. Por favor, intenta nuevamente.";
            document.getElementById("mensajeError").style.display = "block";        });
});

reporteVenta();

function reporteVenta() {


    let ctx = document.getElementById("ventasChart").getContext("2d");

    if (!anioInicio || !anioFin || anioInicio < 0 || anioFin < 0) {
        console.log("Por favor, ingresa años válidos.");
        return;
    }
    // URL de la API (reemplázala con la URL real de tu servidor)
    let apiUrl = `api/reporteVenta/2025/2025`;

    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (!data.data || data.data.length === 0) {
                console.log("No hay datos para mostrar");
                return;
            }

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
            document.getElementById("mensajeError").innerText = "Ocurrió un error al cargar los datos. Por favor, intenta nuevamente.";
            document.getElementById("mensajeError").style.display = "block";        });
}
