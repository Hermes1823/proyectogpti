from joblib import load
import pandas as pd

model = load('aaSales1.joblib')

new_data = pd.DataFrame({
    'year': [2025],
    'month': [2],
    'day': [1],
    'day_of_week': [6]
})

predictions = model.predict(new_data)
print(f"Predicción de demanda: {predictions[0]/32}")