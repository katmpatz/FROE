import scipy
import pandas as pd
import numpy as np
import seaborn as sns
import matplotlib.pylab as plt

print("Start")

# VALID PARTICIPANTS
valid_participants = []
for k in range(11):
    data = pd.read_csv('pilot_results/participant'+str(k)+'.csv')
    if len(data['Trial']) == 70:
        valid_participants.append(k)
    else:
        print(k, len(data['Trial']))
print('* {} valid participants'.format(len(valid_participants)))


# TEST LEARNING MARKET RENTAL
pilot_results = {'participant': [], 'learning_error': []}
for k in valid_participants:
    data = pd.read_csv('pilot_results/participant'+str(k)+'.csv')
    for t in range(30, 40):
        pilot_results['participant'].append('p'+str(k))
        mean_estimation = (data['AnswerMin'].iloc[t] +
                           data['AnswerMax'].iloc[t]) / 2
        pilot_results['learning_error'].append(
            np.abs(data['RentalPrice'].iloc[t] - mean_estimation) / data['RentalPrice'].iloc[t] * 100.0)

pilot_results_df = pd.DataFrame(pilot_results)
ax = sns.barplot(x="participant", y="learning_error", data=pilot_results_df)
plt.savefig('test_learning_market.png')
plt.show()


# KEEP PARTICIPANTS BELOW 10% ERROR IN LEARNING RENTAL PRICE
# valid_participants = [p for p in valid_participants if np.mean(
#     pilot_results_df.loc[pilot_results_df['participant'] == 'p'+str(p)])['learning_error'] < 10]
# print('* {} valid participants (after learning)'.format(len(valid_participants)))

# ------------------------------------------
# TESTING CORRELATION SUPRISE / EXPECTATIONS %
# ------------------------------------------
pilot_results = {'participant': [], 'surprise': [], 'expectations': []}
for k in valid_participants:
    data = pd.read_csv('pilot_results/participant'+str(k)+'.csv')
    for t in range(40, 70):
        pilot_results['participant'].append('p'+str(k))
        pilot_results['surprise'].append(data['Subjective Surprise'].iloc[t])
        pilot_results['expectations'].append(data['Expectations'].iloc[t])

pilot_results_df = pd.DataFrame(pilot_results)
sns.scatterplot(x="surprise", y="expectations", data=pilot_results_df)
plt.savefig('correlation_subjsurprise_expectations.png')
plt.show()

# ------------------------------------------
# TESTING CORRELATION SUPRISE / REACTION TIME %
# ------------------------------------------
pilot_results = {'participant': [], 'surprise': [], 'reaction_time': []}
for k in valid_participants:
    data = pd.read_csv('pilot_results/participant'+str(k)+'.csv')
    for t in range(40, 70):
        pilot_results['participant'].append('p'+str(k))
        pilot_results['surprise'].append(data['Subjective Surprise'].iloc[t])
        pilot_results['reaction_time'].append(data['Reaction Time'].iloc[t])

pilot_results_df = pd.DataFrame(pilot_results)
sns.scatterplot(x="surprise", y="reaction_time", data=pilot_results_df)
plt.savefig('correlation_subjsurprise_reaction_time.png')
plt.show()

# ------------------------------------------
# TESTING CORRELATION EXPECTATIONS / REACTION TIME %
# ------------------------------------------
pilot_results = {'participant': [], 'expectations': [], 'reaction_time': []}
for k in valid_participants:
    data = pd.read_csv('pilot_results/participant'+str(k)+'.csv')
    for t in range(40, 70):
        pilot_results['participant'].append('p'+str(k))
        pilot_results['expectations'].append(data['Expectations'].iloc[t])
        pilot_results['reaction_time'].append(data['Reaction Time'].iloc[t])

pilot_results_df = pd.DataFrame(pilot_results)
sns.scatterplot(x="expectations", y="reaction_time", data=pilot_results_df)
plt.savefig('correlation_expectations_reaction_time.png')
plt.show()




# ------------------------------------------
# TESTING CORRELATION SUPRISE / MODEL ERRORS %
# ------------------------------------------
pilot_results = {'participant': [], 'surprise': [], 'model_error_(%)': []}
for k in valid_participants:
    data = pd.read_csv('pilot_results/participant'+str(k)+'.csv')
    for t in range(40, 70):
        pilot_results['participant'].append('p'+str(k))
        pilot_results['surprise'].append(data['Subjective Surprise'].iloc[t])
        pilot_results['model_error_(%)'].append(
            np.abs(data['RentalPrice'].iloc[t] - data['Recommendation'].iloc[t]) / data['RentalPrice'].iloc[t] * 100.0)

pilot_results_df = pd.DataFrame(pilot_results)
sns.scatterplot(x="surprise", y="model_error_(%)", data=pilot_results_df)
plt.savefig('correlation_subjsurprise_modelerrors.png')
plt.show()


# ------------------------------------------
# TESTING CORRELATION SUPRISE / EXPECTATIONS
# ------------------------------------------
pilot_results = {'participant': [], 'surprise': [], 'log_expectation': []}
for k in valid_participants:
    data = pd.read_csv('pilot_results/participant'+str(k)+'.csv')
    for t in range(40, 70):
        pilot_results['participant'].append('p'+str(k))
        pilot_results['surprise'].append(data['Subjective Surprise'].iloc[t])
        pilot_results['log_expectation'].append(
            np.log(np.abs(data['Answer'].iloc[t] - data['Recommendation'].iloc[t])))

slope, intercept, r, p, se = scipy.stats.linregress(
    pilot_results['surprise'], pilot_results['log_expectation'])
plt.plot([0, 7], [intercept, intercept + slope * 7], '-')
plt.title('Corr: {} (p={})'.format(r, p))
pilot_results_df = pd.DataFrame(pilot_results)
sns.scatterplot(x="surprise", y="log_expectation", data=pilot_results_df)
plt.savefig('correlation_subjsurprise_logexpectation.png')
plt.show()


# ------------------------------------------
# TESTING CORRELATION SUPRISE / DIFF ESTIMATION & ACTUAL PRICE
# ------------------------------------------
pilot_results = {'participant': [], 'surprise': [], 'diffEstimActualprice': []}
for k in valid_participants:
    data = pd.read_csv('pilot_results/participant'+str(k)+'.csv')
    for t in range(40, 70):
        pilot_results['participant'].append('p'+str(k))
        pilot_results['surprise'].append(data['Subjective Surprise'].iloc[t])
        pilot_results['diffEstimActualprice'].append(
            np.abs(data['Answer'].iloc[t] - data['RentalPrice'].iloc[t]))

slope, intercept, r, p, se = scipy.stats.linregress(
    pilot_results['surprise'], pilot_results['diffEstimActualprice'])
plt.plot([0, 7], [intercept, intercept + slope * 7], '-')
plt.title('Corr: {} (p={})'.format(r, p))
pilot_results_df = pd.DataFrame(pilot_results)
sns.scatterplot(x="surprise", y="diffEstimActualprice", data=pilot_results_df)
plt.savefig('correlation_subjsurprise_diffEstimActualprice.png')
plt.show()


# ------------------------------------------
# TESTING CORRELATION SUPRISE / WEIGHT OF ADVICE
# ------------------------------------------
pilot_results = {'participant': [], 'surprise': [], 'weight_of_advice': []}
for k in valid_participants:
    data = pd.read_csv('pilot_results/participant'+str(k)+'.csv')
    for t in range(40, 70):
        pilot_results['participant'].append('p'+str(k))
        pilot_results['surprise'].append(data['Subjective Surprise'].iloc[t])
        weight_of_advice = np.abs(
            data['Final Estimation'].iloc[t] - data['Answer'].iloc[t]) / \
                np.abs(data['Recommendation'].iloc[t] - data['Answer'].iloc[t])
        pilot_results['weight_of_advice'].append(weight_of_advice)

slope, intercept, r, p, se = scipy.stats.linregress(
    pilot_results['surprise'], pilot_results['weight_of_advice'])
plt.plot([0, 7], [intercept, intercept + slope * 7], '-')
plt.title('Corr: {} (p={})'.format(r, p))
pilot_results_df = pd.DataFrame(pilot_results)
sns.scatterplot(x="surprise", y="weight_of_advice", data=pilot_results_df)
plt.savefig('correlation_subjsurprise_weight_of_advice.png')
plt.show()


# ------------------------------------------
# TESTING CORRELATION SUPRISE / RENTAL PRICE
# ------------------------------------------
pilot_results = {'participant': [], 'Subjective Surprise': [], 'RentalPrice': []}
for k in valid_participants:
    data = pd.read_csv('pilot_results/participant'+str(k)+'.csv')
    for t in range(40, 70):
        pilot_results['participant'].append('p'+str(k))
        pilot_results['Subjective Surprise'].append(
            data['Subjective Surprise'].iloc[t])
        pilot_results['RentalPrice'].append(data['RentalPrice'].iloc[t])

pilot_results_df = pd.DataFrame(pilot_results)
sns.scatterplot(x="Subjective Surprise", y="RentalPrice", data=pilot_results_df)
plt.savefig('correlation_subjsurprise_rentalprice.png')
plt.show()


# TESTING MEAN SUPRISE PER HOUSE
pilot_results = {'house_id': [], 'Subjective Surprise': []}
for k in valid_participants:
    data = pd.read_csv('pilot_results/participant'+str(k)+'.csv')
    for t in range(40, 70):
        pilot_results['house_id'].append(data['House'].iloc[t])
        pilot_results['Subjective Surprise'].append(
            data['Subjective Surprise'].iloc[t])

pilot_results_df = pd.DataFrame(pilot_results)
ax = sns.barplot(x="house_id", y="Subjective Surprise", data=pilot_results_df)
plt.savefig('testing_subjsurprise_houseid.png')
plt.show()


# TESTING CORRELATION MAX SURPRISE vs TRUST
pilot_results = {'participant': [], 'MeanSurprise': [], 'Trust': []}
trust_trials = [0, 2, 7, 12, 17, 22, 27]
for k in valid_participants:
    data = pd.read_csv('pilot_results/participant'+str(k)+'.csv')
    for t in range(1, len(trust_trials)):
        pilot_results['participant'].append('p'+str(k))
        t1 = 40+trust_trials[t-1] # 40 = 30 training and 10 testing
        t2 = 40+trust_trials[t]
        pilot_results['MeanSurprise'].append(
            np.mean(data['Subjective Surprise'].iloc[t1:t2]))
        pilot_results['Trust'].append(data['Trust'].iloc[t2])
users = pd.read_csv('pilot_results/users.csv')
for k in valid_participants:
    pilot_results['participant'].append('p'+str(k))
    pilot_results['MeanSurprise'].append(
        np.mean(data['Subjective Surprise'].iloc[40+trust_trials[-1]:70]))
    pilot_results['Trust'].append(
        users.loc[users['User'] == k]['Trust'].to_numpy()[0])

# linear regression to compute correlation:
slope, intercept, r, p, se = scipy.stats.linregress(
    pilot_results['MeanSurprise'], pilot_results['Trust'])

pilot_results_df = pd.DataFrame(pilot_results)
sns.scatterplot(x="MeanSurprise", y="Trust", data=pilot_results_df)
plt.plot([0, 7], [intercept, intercept + slope * 7], '-')
plt.title('Corr: {} (p={})'.format(r, p))
plt.savefig('correlation_meansurprise_trust.png')
plt.show()

print("Done")
