import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestRegressor
from sklearn.metrics import mean_squared_error
from joblib import dump, load

def load_data(file_path):
    data = pd.read_excel(file_path)
    return data

def preprocess_data(data):
    data['transaction_date'] = data['transaction_date'].astype(str)
    data['transaction_time'] = data['transaction_time'].astype(str)

    data['transaction_datetime'] = pd.to_datetime(data['transaction_date'] + ' ' + data['transaction_time'])

    data['year'] = data['transaction_datetime'].dt.year
    data['month'] = data['transaction_datetime'].dt.month
    data['day'] = data['transaction_datetime'].dt.day
    data['day_of_week'] = data['transaction_datetime'].dt.dayofweek

    daily_demand = data.groupby('transaction_date')['transaction_qty'].sum().reset_index()
    daily_demand.rename(columns={'transaction_qty': 'daily_demand'}, inplace=True)

    features = data[['transaction_date', 'year', 'month', 'day', 'day_of_week']].drop_duplicates()
    merged_data = pd.merge(features, daily_demand, on='transaction_date', how='inner')

    X = merged_data[['year', 'month', 'day', 'day_of_week']]
    y = merged_data['daily_demand']

    return X, y

def train_model(X, y):
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
    
    model = RandomForestRegressor(n_estimators=100, random_state=42)
    model.fit(X_train, y_train)
    
    y_pred = model.predict(X_test)
    print(f'Mean Squared Error: {mean_squared_error(y_test, y_pred)}')
    
    return model

def export_model(model, file_name):
    dump(model, file_name)

def load_model(file_name):
    return load(file_name)

def predict_demand(model, input_data):
    prediction = model.predict(input_data)
    return prediction

def main():
    file_path = 'aaSales1.xlsx'
    model_output = 'aaSales1.joblib'

    print("Cargando datos...")
    data = load_data(file_path)

    print("Preprocesando datos...")
    X, y = preprocess_data(data)

    print("Entrenando modelo...")
    model = train_model(X, y)

    print("Exportando modelo...")
    export_model(model, model_output)

    print(f"Modelo exportado a {model_output}")

if __name__ == "__main__":
    main()
