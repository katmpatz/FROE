import pandas;
import ast;

# read the csv with the order of the houses
order = pandas.read_csv("order.csv")
# print(order["house_id"][0]);

#create a list with the trainiing data for each trial
training_data = []

# for each row add the first 20 (training houses) in a list 
for x in order["house_id"]:
  # Converting string to list
  house_list = x.strip('][').split(', ')
  training_data.append(house_list[0:20])


# read the csv with the houses
houses = pandas.read_csv("homes.csv")

# create a dictionary with the id of the house and the type
houses_type = {}
for index, row in houses.iterrows():
    houses_type.update({row["id"]: row["type"]})


# create a new list to save all the information
count_apt_type = []

#for each row in output
for t_list in training_data:
    #num_of_rooms = 0, num_of_studios = 0, num_of_apartments = 0
    num_of_rooms = 0 
    num_of_studios = 0
    num_of_apartments = 0
    #for each apartment in training
    for ap in t_list:
        #check the type of the apartment and increace the counter
        id = int(ap)
        if houses_type.get(id) == "apartment":
            num_of_apartments += 1
        elif houses_type.get(id) == "studio":
            num_of_studios += 1
        elif houses_type.get(id) == "room":
            num_of_rooms += 1
    #end for
    # create a new list [num_of_rooms, num_of_studios, num_of_apartments]
    # add the list to the count_apt_type list
    count_apt_type.append([num_of_rooms, num_of_studios, num_of_apartments])
    print([num_of_rooms, num_of_studios, num_of_apartments])
#end for 

#create a csv with the counting list
for index, row in order.iterrows():
    #print(row['rooms'], row['bathrooms'], row['squaremeters'])
    order.loc[index, 'CountRooms'] = count_apt_type[index][0]
    order.loc[index, 'CountStudios'] = count_apt_type[index][1]
    order.loc[index, 'CountApartments'] = count_apt_type[index][2]

# writing into the file
order.to_csv("output.csv", index=False)




