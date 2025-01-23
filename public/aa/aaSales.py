import joblib
import numpy as np
import pandas as pd
import sys

path = 'aa/aaSales.joblib'

def load_model_and_predict(input_data):
    model = joblib.load(path)

    input_data = np.array(input_data).reshape(1, -1)

    arreglo = ['Restaurant ', 'NumeroQuejas', 'TotalPEdidosTarde', 'Mes', 'Día', 'Año',
           'estacion_Invierno', 'estacion_Otoño', 'estacion_Primavera',
           'estacion_Verano', 'tipoDia_Día de descanso', 'tipoDia_Día festivo',
           'tipoDia_Día laboral', 'NivelVentasPresencial_Alto',
           'NivelVentasPresencial_Bajo', 'NivelVentasPresencial_Medio',
           'DistritoConMasVenta_Florencia de Mora',
           'DistritoConMasVenta_Huanchaco', 'DistritoConMasVenta_La Esperanza',
           'DistritoConMasVenta_Laredo', 'DistritoConMasVenta_Trujillo',
           'DistritoConMasVenta_Victor Larco Herrera',
           'DistritoConMasVenta_el porvenir']

    #input_data = pd.DataFrame([input_data], columns = arreglo)

    prediction = model.predict(input_data)

    #prediction_exact = int(round(prediction[0]))
    print(int(round(prediction[0])))

    return int(round(prediction[0]))

if __name__ == '__main__':
    input_data = [float(arg) for arg in sys.argv[1:]]
    load_model_and_predict(input_data)