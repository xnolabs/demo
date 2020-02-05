##GLOBAL SCOPE
alphabet = 'abcdefghijklmnopqrstuvwxyz'
alpha_list = list(alphabet)
import sys

## USER DEFINED FUNCTIONS
def user_menu():
    print("e: Encrypt New Message")
    print("d: Decrypt Message")
    print("q: Quit")

    option = input("What would you like to do? ")
    
    return option

def encryption(message, key):
    alphabet = 'abcdefghijklmnopqrstuvwxyz'
    alpha_list = list(alphabet) ## CONVERTS ALPHABET STRING TO ALPHABET LIST   
    en_message = '' ## VARIABLE TO STORE ENCRYPTED MESSAGE
    encrypted = {} ## DICTIONARY FOR ALPHABET & KEY

    for i in range(0, len(alpha_list)):
        encrypted[alpha_list[i]] = alpha_list[(i+key) % len(alpha_list)] ## Create Dictionary & assign position of letter in string as index value
    for l in message:   
        if l in encrypted:
            en_message += encrypted[l] ## IF Letter in message is Lowercase & matches dictonary, return letter from key shift
        if l not in encrypted:
            en_message += l     ## IF Letter in message is Uppercase or Character, return Uppercase or character
            
    return en_message
        
def exit_program():
    sys.exit() ## EXITS CURRENT PYTHON SCRIPT FROM TERMINAL

## MAIN PROGRAM
    
while True:
    try:
        option = user_menu()
        if option == 'e':
            message = input("Enter a message: ")
            key = int(input("Enter a key (1-25): "))
            if key < 1 or key > 25:
                print("You have entered an invalid key... Please Try again!")
                continue
            encryption(message, key)
            print("Encrypted Message: ", encryption(message, key))
            continue
        elif option == 'd':
            print("This option is currently unavailable, please come back later!")
            continue
        elif option == 'q':
            exit_program()
        else:
            print("You have entered an incorrect option, please try again!")
    except ValueError:
        continue