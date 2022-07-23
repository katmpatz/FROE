import pandas;
from sklearn import linear_model;
import statsmodels.api as sm;
import numpy as np

df = pandas.read_csv("model_training_data_good.csv")
df_test = pandas.read_csv("model_testing_data_good.csv")

# df_train, df_test = train_test_split(df, train_size = 0.6, test_size = 0.4, random_state = 10)
# print(len(df_train))
# print(len(df_test))


# list with independent variables
X = df[['rooms', 'bathrooms', 'squaremeters', 'floor', 'typenum', 'furnishednum', 'transport', 'equipped', 'renovated', 'shops', 'cellar', 'balcony', 'parking', 'shared', 'green', 'historic', 'university']]
X_test = df_test[['rooms', 'bathrooms', 'squaremeters', 'floor', 'typenum', 'furnishednum', 'transport', 'equipped', 'renovated', 'shops', 'cellar', 'balcony', 'parking', 'shared', 'green', 'historic', 'university']]

# dependent variable
y = df['price']
y_test = df_test['price']

df.to_numpy()

regr = linear_model.LinearRegression()
regr.fit(X.values, y)

x = sm.add_constant(X.values)
model = sm.OLS(y, x)
results = model.fit()
print(results.summary())

r_sq = regr.score(X.values, y)
print(f"intercept: {regr.intercept_}")
print(f"slope: {regr.coef_}")
print(f"coefficient of determination: {r_sq}")

df_test["prediction"] = 0

y_pred = regr.predict(X_test)
errors = np.sqrt(np.square(y_pred - y_test)) / y_test

# for house_list in range(100):
#    my_list = from_file_take_line(house_list)
#    X_sel = X[my_list]
#    y_sel = y[my_list]
#    pred = regr.predict(data)
#    errors = np.sqrt(np.square(y_sel - pred))
# np.mean (average), 

import matplotlib.pylab as plt
plt.plot(errors, '.')
plt.show()

plt.hist(errors, bins=8)
plt.show()


#create a csv with the predicted price
for index, row in df_test.iterrows():
    #print(row['rooms'], row['bathrooms'], row['squaremeters'])
    predicted_price = regr.predict([[row['rooms'], row['bathrooms'], row['squaremeters'], row['floor'], row['typenum'], row['furnishednum'], row['transport'], row['equipped'], row['renovated'], row['shops'], row['cellar'], row['balcony'], row['parking'], row['shared'], row['green'], row['historic'], row['university']]])
    df_test.loc[index, 'prediction'] = predicted_price

# writing into the file
df_test.to_csv("regression_good.csv", index=False)
