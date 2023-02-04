 ########exercice 1########
keys = ['Ten', 'Twenty', 'Thirty']
values = [10, 20, 30]
zipped = zip(keys, values)
result = dict(zipped)
print(result)

 ########exercice 2########
family = {"rick": 43, 'beth': 13, 'morty': 5, 'summer': 8}
total_cost = 0
for name, age in family.items():
  if age < 3:
    cost = 0
  elif age >= 3 and age <= 12:
    cost = 10
  else:
    cost = 15
  total_cost += cost
  print(f"{name} doit payer {cost} $ pour le film.")
print(f"Le coût total de la famille pour les films est de {total_cost} $.")
family = {}
num_family_members = int(input("Combien y a-t-il de membres dans votre famille ? "))
for i in range(num_family_members):
  name = input("Veuillez saisir le nom d'un membre de la famille : ")
  age = int(input("Veuillez saisir l'âge de ce membre de la famille : "))
  family[name] = age
total_cost = 0
for name, age in family.items():
  if age < 3:
    cost = 0
  elif age >= 3 and age <= 12:
    cost = 10
  else:
    cost = 15
  total_cost += cost
  print(f"{name} doit payer {cost} $ pour le film.")
print(f"Le coût total de la famille pour les films est de {total_cost} $.")


 ########exercice 3########
brand = {
  "name": "Zara",
  "creation_date": 1975,
  "creator_name": "Amancio Ortega Gaona",
  "type_of_clothes": ["men", "women", "children", "home"],
  "international_competitors": ["Gap", "H&M", "Benetton"],
  "number_stores": 7000,
  "major_color": {
    "France": ["blue"],
    "Spain": ["red"],
    "US": ["pink", "green"]
  }
}
brand["number_stores"] = 2
print(f"Les clients de Zara sont hommes, femmes, enfants et ménage.")
brand["country_creation"] = "Spain"
if "international_competitors" in brand:
  brand["international_competitors"].append("Desigual")
del brand["creation_date"]
print(f"Le dernier concurrent international de Zara est {brand['international_competitors'][-1]}.")
print(f"Les principales couleurs de vêtements de Zara aux États-Unis sont {brand['major_color']['US']}.")
print(f"Il y a {len(brand)} paires clé-valeur dans le dictionnaire brand.")
print(f"Les clés du dictionnaire brand sont {list(brand.keys())}.")
more_on_zara = {
  "creation_date": 1975,
  "number_stores": 10000
}
brand.update(more_on_zara)
print(f"Le nombre de magasins de Zara est {brand['number_stores']}.")




 ########exercice 4########
users = ["Mickey","Minnie","Donald","Ariel","Pluto"]
disney_users_A = {}
for i, user in enumerate(users):
  disney_users_A[user] = i
print(disney_users_A)
disney_users_B = {}
for i, user in enumerate(users):
  disney_users_B[i] = user
print(disney_users_B)
disney_users_C = {}
for i, user in enumerate(sorted(users)):
  disney_users_C[user] = i
print(disney_users_C)
disney_users_D = {}
for i, user in enumerate(users):
  if "i" in user:
    disney_users_D[user] = i
print(disney_users_D)
disney_users_E = {}
for i, user in enumerate(users):
  if user[0] in ["m", "p"]:
    disney_users_E[user] = i
print(disney_users_E)
