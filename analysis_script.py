import pandas as pd
import numpy as np
import seaborn as sns
import matplotlib.pylab as plt

# VALID PARTICIPANTS
valid_participants = []
for k in range(11):
    data = pd.read_csv('results/participant'+str(k)+'.csv')
    if len(data['Trial']) == 70:
        valid_participants.append(k)
    else:
        print(k, len(data['Trial']))
print('* {} valid participants'.format(len(valid_participants)))


# TEST LEARNING MARKET RENTAL
results = {'participant': [], 'learning_error': []}
for k in valid_participants:
    data = pd.read_csv('results/participant'+str(k)+'.csv')
    for t in range(30, 40):
        results['participant'].append('p'+str(k))
        mean_estimation = (data['AnswerMin'].iloc[t] +
                           data['AnswerMax'].iloc[t]) / 2
        results['learning_error'].append(
            np.abs(data['RentalPrice'].iloc[t] - mean_estimation) / data['RentalPrice'].iloc[t] * 100.0)

results_df = pd.DataFrame(results)
ax = sns.barplot(x="participant", y="learning_error", data=results_df)
plt.savefig('test_learning_market.png')
plt.show()


# KEEP PARTICIPANTS BELOW 10% ERROR IN LEARNING RENTAL PRICE
# valid_participants = [p for p in valid_participants if np.mean(
#     results_df.loc[results_df['participant'] == 'p'+str(p)])['learning_error'] < 10]
# print('* {} valid participants (after learning)'.format(len(valid_participants)))


# TESTING CORRELATION SUPRISE / MODEL ERRORS %
results = {'participant': [], 'surprise': [], 'model_error_(%)': []}
for k in valid_participants:
    data = pd.read_csv('results/participant'+str(k)+'.csv')
    for t in range(40, 70):
        results['participant'].append('p'+str(k))
        print(k, t, data['Subjective Surprise'].iloc[t])
        results['surprise'].append(data['Subjective Surprise'].iloc[t])
        results['model_error_(%)'].append(
            np.abs(data['RentalPrice'].iloc[t] - data['Recommendation'].iloc[t]) / data['RentalPrice'].iloc[t] * 100.0)

results_df = pd.DataFrame(results)
sns.scatterplot(x="surprise", y="model_error_(%)", data=results_df)
plt.savefig('correlation_subjsurprise_modelerrors.png')
plt.show()


# TESTING CORRELATION SUPRISE / RENTAL PRICE
results = {'participant': [], 'Subjective Surprise': [], 'RentalPrice': []}
for k in valid_participants:
    data = pd.read_csv('results/participant'+str(k)+'.csv')
    for t in range(40, 70):
        results['participant'].append('p'+str(k))
        results['Subjective Surprise'].append(data['Subjective Surprise'].iloc[t])
        results['RentalPrice'].append(data['RentalPrice'].iloc[t])

results_df = pd.DataFrame(results)
sns.scatterplot(x="Subjective Surprise", y="RentalPrice", data=results_df)
plt.savefig('correlation_subjsurprise_rentalprice.png')
plt.show()


# TESTING MEAN SUPRISE PER HOUSE
results = {'house_id': [], 'Subjective Surprise': []}
for k in valid_participants:
    data = pd.read_csv('results/participant'+str(k)+'.csv')
    for t in range(40, 70):
        results['house_id'].append(data['House'].iloc[t])
        results['Subjective Surprise'].append(data['Subjective Surprise'].iloc[t])

results_df = pd.DataFrame(results)
ax = sns.barplot(x="house_id", y="Subjective Surprise", data=results_df)
plt.savefig('testing_subjsurprise_houseid.png')
plt.show()