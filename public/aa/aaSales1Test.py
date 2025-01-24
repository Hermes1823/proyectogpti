from joblib import load
import pandas as pd

model = load('aaSales1.joblib')

new_data = pd.DataFrame({
    'year': [2025],
    'month': [1],
    'day': [24],
    'day_of_week': [2]
})

predictions = model.predict(new_data)
print(f"Predicción de demanda: {predictions[0]}")