# ############exercice 1##############
number = int(input("Veuillez saisir un nombre : "))
length = int(input("Veuillez saisir une longueur : "))
multiples_list = []
counter = 1
while len(multiples_list) < length:
  multiples_list.append(number * counter)
  counter += 1
print(multiples_list)


# ############exercice 2##############


string = input("Veuillez saisir une chaîne : ")
new_string = ""
last_added = ""
for letter in string:
  if letter != last_added:
    new_string += letter
    last_added = letter
print(new_string)
