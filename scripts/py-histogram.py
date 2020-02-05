count = 0 # SETS count to 0
group1 = 0 # SETS category 1 to 0 (0 to 29)
group2 = 0 # SETS category 2 to 0 (30 to 39)
group3 = 0 # SETS category 3 to 0 (40 to 69)
group4 = 0 # SETS category 4 to 0 (70 to 100)
mark_store = [] #SETS Mark storage used to calculate statistics

while True:
    try:
        mark = int(input("Enter a mark or -1 to Display Results: ")) #USER INPUT to enter Integer & CHECKS if integer entered
        if mark >=0:
            if mark >=70 and mark <= 100: # (PROCESS) ONLY Executed if statement above is True - Check integer inputted against Condition  
                group4 += 1 # ADD 1 to Category 4 (70 to 100) only if statement is true
            elif mark >= 40 and mark <= 69: # (PROCESS) ONLY Executed if statement above is False - Check integer inputted against Condition 
                group3 += 1 # ADD 1 to Category 3 (ONLY if statement is true)
            elif mark >= 30 and mark <= 39: # (PROCESS) ONLY Executed if statement above is False - Check integer inputted against Condition    
                group2 += 1 # ADD 1 to Category 2 (ONLY if statement is true)
            elif mark >=0 and mark <= 29: # (PROCESS) ONLY Executed if statement above is False - Check integer inputted against Condition    
                group1 += 1 # ADD 1 to Category 1 (ONLY if statement is true)
        if mark >= 0 and mark <= 100: # (PROCESS) Check USER INPUT is greater than 0
            count += 1 #ADD 1 to COUNT IF Condition has been met
            mark_store.append(mark) #ADD Number to array IF number entered meets Condition        
        if mark > 100: # CHECK - is number entered greater than 100?
            print("You have entered a number more than 100, please try again")
            continue # IF True THEN allow user to re-enter a number
    except ValueError: # ONLY True when a non-numeric character is entered
        print("You have entered a non-numeric Character, please try again!")
        continue # IF True THEN allow user to re-enter a number
    else: # ONLY executed when -1 is entered to display results
        if mark == -1:
            break # Exit Loop
        
print("Student Statistics: ")

# Horizontal Histogram Code
print("Horizontal Histogram: ")
print(" 0 to 29:   ", end=" ")
for i in range(group1): 
    print("*", end=" ") # Replace value of i with symbol "*"
else:
    print("\n 30 to 39:  ", end=" ")
    for i in range(group2):
        print("*", end=" ") # Replace value of i with symbol "*"
    else:
        print("\n 40 to 69:  ", end=" ")
        for i in range(group3):
            print("*", end=" ") # Replace value of i with symbol "*"
        else:
            print("\n 70 to 100: ", end=" ")
            for i in range(group4):
                print("*", end=" ") # Replace value of i with symbol "*"
                
print("\n")
# Vertical Histogram Code
print("Vertical Histogram: ")
group_values = {"0 to 29": group1, "30 to 39": group2, "40 to 69": group3, "70 to 100": group4} #CREATE Dictonary AND MAP Group Header to Group Contents

print("|   0 to 29   |   30 to 39   |   40 to 69   |   70 to 100   |") #Display Group Headers

group = max(group_values.values()) # CHECK all Dicts in group_values for max value for each group

for row in range(group - 1): # -1 has been added to remove a visual error that adds an extra 1 value to all columns, I have rectified this error with this as a short term solution 
    newrow = ""
    for value in group_values.values():
        if value < row: 
            newrow += "               " # PRINT this is no value in group
        else:
            newrow += "       *       " # PRINT this if there is still a value in group 
    print(newrow) # PRINT contents of newrow depending on which condition is true above

print(newrow) # PRINT empty newrow once all values have been printed on console
print("Total number of Student Marks: ", count)
average = sum(mark_store) / len(mark_store) # ADD all numbers in array then divide by number of items in array equals average
print("Average Student Mark: ", average)
student_pass = group3 + group4 # group3 & group 4 are only groups with a value greater than 40, simple addition sum - could be implemented using the mark array, however I chose not to do this as it over complicates the objective of this program
print("Total Students with pass mark 40+: ", student_pass)
print("Lowest Mark: ", min(mark_store)) #CHECK mark array for lowest value inputted
print("Highest Mark: ", max(mark_store)) #CHECK mark array for highest value inputted