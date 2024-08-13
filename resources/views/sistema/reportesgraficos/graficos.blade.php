<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes Gráficos</title>
    <!-- Librerías de amCharts -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        .chart-container {
            width: 45%;
            margin: 10px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }
        .chart-title {
            margin-bottom: 10px;
            font-size: 1.5em;
            color: #333;
        }
        .chart-content {
            width: 100%;
            height: 300px;
            background-color: #fafafa;
            border: 1px solid #ddd;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="chart-container">
            <div class="chart-title">Reporte Gráfico 1</div>
            <div id="chartbarras" class="chart-content">
                <!-- Aquí se insertará el gráfico 1 -->
            </div>
        </div>

        <div class="chart-container">
            <div class="chart-title">Reporte Gráfico 2</div>
            <div id="chartbarras2" class="chart-content">
                <!-- Aquí se insertará el gráfico 2 -->
            </div>
        </div>
    </div>

    @push('js')
        
    @endpush
    <!-- Código del primer gráfico -->
    <script>
        am5.ready(function() {
            var root1 = am5.Root.new("chartbarras");
            root1.setThemes([am5themes_Animated.new(root1)]);
            
            var chart1 = root1.container.children.push(am5xy.XYChart.new(root1, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true,
                paddingLeft: 0,
                paddingRight: 1
            }));
            
            var cursor1 = chart1.set("cursor", am5xy.XYCursor.new(root1, {}));
            cursor1.lineY.set("visible", false);
            
            var xRenderer1 = am5xy.AxisRendererX.new(root1, {
                minGridDistance: 30,
                minorGridEnabled: true
            });

            xRenderer1.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });

            xRenderer1.grid.template.setAll({
                location: 1
            });

            var xAxis1 = chart1.xAxes.push(am5xy.CategoryAxis.new(root1, {
                maxDeviation: 0.3,
                categoryField: "country",
                renderer: xRenderer1,
                tooltip: am5.Tooltip.new(root1, {})
            }));

            var yRenderer1 = am5xy.AxisRendererY.new(root1, {
                strokeOpacity: 0.1
            });

            var yAxis1 = chart1.yAxes.push(am5xy.ValueAxis.new(root1, {
                maxDeviation: 0.3,
                renderer: yRenderer1
            }));
            
            var series1 = chart1.series.push(am5xy.ColumnSeries.new(root1, {
                name: "Series 1",
                xAxis: xAxis1,
                yAxis: yAxis1,
                valueYField: "value",
                sequencedInterpolation: true,
                categoryXField: "country",
                tooltip: am5.Tooltip.new(root1, {
                    labelText: "{valueY}"
                })
            }));

            series1.columns.template.setAll({
                cornerRadiusTL: 5,
                cornerRadiusTR: 5,
                strokeOpacity: 0
            });

            series1.columns.template.adapters.add("fill", function(fill, target) {
                return chart1.get("colors").getIndex(series1.columns.indexOf(target));
            });

            series1.columns.template.adapters.add("stroke", function(stroke, target) {
                return chart1.get("colors").getIndex(series1.columns.indexOf(target));
            });

            // Cargar los datos para el primer gráfico
            am5.net.load("http://127.0.0.1:8000/api/graficojson1").then(function(result) {
                var data1 = am5.JSONParser.parse(result.response);
                console.log(result.response);
                xAxis1.data.setAll(data1);
                series1.data.setAll(data1);
                series1.appear(1000);
                chart1.appear(1000, 100);
            }).catch(function(result) {
                console.log("Error loading: " + result.xhr.responseURL);
            });
        });
    </script>

    <!-- Código del segundo gráfico -->
    <script>
        am5.ready(function() {
            var root2 = am5.Root.new("chartbarras2");
            root2.setThemes([am5themes_Animated.new(root2)]);
            
            var chart2 = root2.container.children.push(am5xy.XYChart.new(root2, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true,
                paddingLeft: 0,
                paddingRight: 1
            }));
            
            var cursor2 = chart2.set("cursor", am5xy.XYCursor.new(root2, {}));
            cursor2.lineY.set("visible", false);
            
            var xRenderer2 = am5xy.AxisRendererX.new(root2, {
                minGridDistance: 30,
                minorGridEnabled: true
            });

            xRenderer2.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });

            xRenderer2.grid.template.setAll({
                location: 1
            });

            var xAxis2 = chart2.xAxes.push(am5xy.CategoryAxis.new(root2, {
                maxDeviation: 0.3,
                categoryField: "category",
                renderer: xRenderer2,
                tooltip: am5.Tooltip.new(root2, {})
            }));

            var yRenderer2 = am5xy.AxisRendererY.new(root2, {
                strokeOpacity: 0.1
            });

            var yAxis2 = chart2.yAxes.push(am5xy.ValueAxis.new(root2, {
                maxDeviation: 0.3,
                renderer: yRenderer2
            }));
            
            var series2 = chart2.series.push(am5xy.ColumnSeries.new(root2, {
                name: "Series 2",
                xAxis: xAxis2,
                yAxis: yAxis2,
                valueYField: "value",
                sequencedInterpolation: true,
                categoryXField: "category",
                tooltip: am5.Tooltip.new(root2, {
                    labelText: "{valueY}"
                })
            }));

            series2.columns.template.setAll({
                cornerRadiusTL: 5,
                cornerRadiusTR: 5,
                strokeOpacity: 0
            });

            series2.columns.template.adapters.add("fill", function(fill, target) {
                return chart2.get("colors").getIndex(series2.columns.indexOf(target));
            });

            series2.columns.template.adapters.add("stroke", function(stroke, target) {
                return chart2.get("colors").getIndex(series2.columns.indexOf(target));
            });

            // Cargar los datos para el segundo gráfico
            am5.net.load("http://127.0.0.1:8000/api/graficojson2").then(function(result) {
                var data2 = am5.JSONParser.parse(result.response);
                console.log(result.response);
                xAxis2.data.setAll(data2);
                series2.data.setAll(data2);
                series2.appear(1000);
                chart2.appear(1000, 100);
            }).catch(function(result) {
                console.log("Error loading: " + result.xhr.responseURL);
            });
        });
    </script>
</body>
</html>
