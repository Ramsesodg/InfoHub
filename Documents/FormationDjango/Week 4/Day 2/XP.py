########exercice 1########
#my_fav_numbers={1,2,3,6,5}
"""my_fav_numbers.add(6)
my_fav_numbers.add(7)
my_fav_numbers.remove(7)
friend_fav_numbers={9,8,5,7,3}
our_fav_numbers=my_fav_numbers.union(friend_fav_numbers)
print("our_fav_numbers")"""

########exercice 2########

#Il n'est pas possible d'ajouter d'éléments à un tuple une fois qu'il a été créé, car les tuples sont immuables en Python.

###################exercice 3###########################

"""basket=["bananes","mertilles","pommes","orange"]
del basket[0]
print(basket)
del basket[0]
print(basket)
basket.append("kiwi")
print(basket)
basket.append("goyave")
print(basket)
print("nombre de pommes:", basket.count("pommes"))
print(basket)
basket.clear()
print(basket)"""

########exercice 4########
#Un float (flottant) est un nombre à virgule flottante en Python, 
#c'est-à-dire un nombre décimal. Les nombres à virgule flottante sont utilisés pour représenter des nombres 
#avec une précision inférieure ou supérieure à celle des nombres entiers (int).
#La différence principale entre un entier et un flottant est que les entiers ne peuvent 
#contenir que des nombres entiers, tandis que les flottants peuvent contenir des nombres décimaux.
#Par exemple, le nombre entier 5 est différent du nombre flottant 5.0, bien qu'ils aient la même valeur
"""sequence = []
for i in range(1, 9):
  sequence.append(i + 0.5)
  
  
########exercice 5########
for i in range(1, 21):
  print(i)
for i in range(1, 21):
      if i % 2 == 0:
       print(i)  
  
########exercice 6########
while True:
    name = input("entrez votre nom: ")
    if name == "yasmine":
     break
    print("salut, {}!".format(name))
    
    ########exercice 7########
fruitPréférés = input("saisir votre fruit préféré: ")
fruitPréférés_list =fruitPréférés.split()

fruit = input("saisir le nom d'un fruit: ")
if fruit in fruitPréférés_list:
  print(" Vous avez choisi l'un de vos fruits préférés ! Prendre plaisir!")
else:
  print("Vous avez choisi un nouveau fruit. J'espère que tu apprécies")
"""
 ########exercice 8########
"""garnitures = []
prix_total = 10

while True:
  garniture = input("saisir une serie garniture de pizza: ")
  if garniture == "quit":
    break
  garnitures.append(garniture)
  prix_total += 2.5

print("vous ajouterez cette garniture à leur pizza:")
for garniture in garnitures:
  print("- {}".format(garniture))
print("prix total: ${:.2f}".format(prix_total))

 ########exercice 9########
cout_total = 0

while True:
  age = int(input("saisir l'age de la personne: "))
  if age < 3:
    prix_tickets = 0
  elif age < 13:
    prix_tickets = 10
  else:
    prix_tickets = 15
  cout_total += prix_tickets
  plus_tickets = input("vous voulez plus de  tickets? (Y/N)")
  if plus_tickets.lower() != "y":
    break

print("cout total: ${}".format(cout_total))

"""
 ########exercice 10########
"""sandwich_orders = ['tuna', 'ham', 'turkey', 'veggie']
finished_sandwiches = []

while sandwich_orders:
  current_sandwich = sandwich_orders.pop()
  print("I made your {} sandwich".format(current_sandwich))
  finished_sandwiches.append(current_sandwich)

print("All sandwiches have been made:")
for sandwich in finished_sandwiches:
  print("- {}".format(sandwich))"""
  
  
 ########exercice 11########
sandwich_orders = ['tuna', 'ham', 'turkey', 'veggie']
finished_sandwiches = []

while sandwich_orders:
  current_sandwich = sandwich_orders.pop()
  print("I made your {} sandwich".format(current_sandwich))
  finished_sandwiches.append(current_sandwich)
print("Désolé, nous sommes en rupture de stock de pastrami.")

while 'pastrami' in sandwich_orders:
    sandwich_orders.remove('pastrami')

print(sandwich_orders)

for sandwich in finished_sandwiches:
    if sandwich == 'pastrami':
        continue
