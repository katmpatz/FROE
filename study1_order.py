import pandas
import random

#read data for phase 1 and add them to a list
p1 = pandas.read_csv("participant_data_phase1.csv")
p1List = p1['id'].tolist()
print(p1List)


#read data for phase 2 and add them to a list
p2 = pandas.read_csv("participant_data_phase2.csv")
p2List = p2['id'].tolist()
print(p2List)


#read data for phase 3 and add them to a list
p3 = pandas.read_csv("participant_data_phase3.csv")
p3List = p3['id'].tolist()
print(p3List)


#create a dictionary for 100 participants 
#{"trial": i, "user_id": i, "order": [],"condition": 3}
users = []
for u in range(300):
     #for each participant create an order list
    users.append({"trial": u, "user_id": u, "order":[], "condition": 3})

    #shuffle the list of houses in phase 1 and add them to the order list
    # Get length of List
    n1 = len(p1List)
    p1Shuffled = random.sample(p1List, n1)
    for i in range(n1):
        users[u]['order'].append(p1Shuffled[i])

    #shuffle the list of houses in phase 2 and add them to the order list
    n2 = len(p2List)
    p2Shuffled = random.sample(p2List, n2)
    for i in range(n2):
        users[u]['order'].append(p2Shuffled[i])

    #add the houses 176 and 110 first in the list for each participant (they are first and second house in the list)
    users[u]['order'].append(p3List[0])
    users[u]['order'].append(p3List[1])

    #shuffle the list of houses in phase 3 and add them to the order list
    n3 = len(p3List)
    p3Shuffled = random.sample(p3List[2:], n3 - 2) #minus 2 because we want to keep the first two houses(176,110) the same for all participants
    for i in range(n3-2):
        users[u]['order'].append(p3Shuffled[i])

# print(users)

df = pandas.DataFrame.from_dict(users) 
df.to_csv("users.csv", index = False, header=True)

