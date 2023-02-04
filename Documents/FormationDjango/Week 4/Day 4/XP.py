########exercice 1########
def display_message():
    print("Je suis en train d'apprendre à écrire des fonctions en Python.")
display_message()

########exercice 2########
def favorite_book(title):
    print("One of my favorite books is " + title + ".")
favorite_book("Alice in Wonderland")

      ########exercice 3########
def describe_city(city, country="Iceland"):
        print(city + " is in " + country + ".")
describe_city("Reykjavik")

        ########exercice 4########
import random
def compare_numbers(num):
    random_num = random.randint(1, 100)
    if num == random_num:
        print("Success! The numbers are the same!!!.")
    else:
        print("Fail. The numbers are different. Number: " + str(num) + " Random number: " + str(random_num))
compare_numbers(50)
        
          ########exercice 5########
def make_shirt(size="large", text="I love Python"):
    print("The size of the shirt is " + size + " and the text is '" + text + "'.")
make_shirt()
make_shirt(size="medium")
make_shirt(size="small", text="Python rocks!")
make_shirt(text="Python is the best", size="x-large")
          
            ########exercice 6########
            
magician_names = ['Harry Houdini', 'David Blaine', 'Criss Angel']
def show_magicians(names):
    for name in names:
        print(name)
def make_great(names):
    for i in range(len(names)):
        names[i] = "the Great " + names[i]
make_great(magician_names)
show_magicians(magician_names)
            
              ########exercice 7########
import random
def get_random_temp(season="all"):
    if season == "all":
        return random.randint(-10, 40)
    elif season == "summer":
        return random.randint(16, 40)
    elif season == "fall":
        return random.randint(-10, 16)
    elif season == "winter":
        return random.randint(-10, 16)
    elif season == "spring":
        return random.randint(-10, 16)
def main():
    temp = get_random_temp()
    print("The current temperature is " + str(temp) + " degrees Celsius.")
    if temp < 0:
        print("Brrr, it's freezing! Wear extra layers today.")
    elif temp < 16:
        print("It's pretty cold! Don't forget your coat.")
    elif temp < 24:
        print("It's a bit chilly.")
    elif temp < 32:
        print("It's quite warm.")
    elif temp < 40:
        print("It's very hot.")

season = input("Enter a season:")
