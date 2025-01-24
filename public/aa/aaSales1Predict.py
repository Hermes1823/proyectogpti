import sys
import pandas as pd
from joblib import load

def main():
    model = load('aa/aaSales1.joblib')

    year = int(sys.argv[1])
    month = int(sys.argv[2])
    day = int(sys.argv[3])
    day_of_week = int(sys.argv[4])

    input_data = pd.DataFrame({
        'year': [year],
        'month': [month],
        'day': [day],
        'day_of_week': [day_of_week]
    })

    prediction = model.predict(input_data)

    print(prediction[0])

if __name__ == '__main__':
    main()
