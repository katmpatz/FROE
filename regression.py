import pandas;
from sklearn import linear_model;

df = pandas.read_csv("houses.csv")


# list with independent variables
X = df[['rooms', 'bathrooms', 'squaremeters', 'floor', 'typenum', 'furnishednum']]
# dependent variable
y = df['price']

df.to_numpy()

regr = linear_model.LinearRegression()
regr.fit(X.values, y)

#predictedCO2 = regr.predict([[1, 1, 25, 3, 2, 1]])

#print(predictedCO2)
df["prediction"] = 0

for index, row in df.iterrows():
    print(row['rooms'], row['bathrooms'], row['squaremeters'])
    predicted_price = regr.predict([[row['rooms'], row['bathrooms'], row['squaremeters'], row['floor'], row['typenum'], row['furnishednum']]])
    df.loc[index, 'prediction'] = predicted_price

# writing into the file
df.to_csv("homes1.csv", index=False)
