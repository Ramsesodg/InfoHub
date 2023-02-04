 ########exercice 1########
word = input("Veuillez saisir un mot : ")
letter_indexes = {}
for i, letter in enumerate(word):
  if letter not in letter_indexes:
    letter_indexes[letter] = []
  letter_indexes[letter].append(i)
print(letter_indexes)

  ########exercice 2########
wallet = float(input("Combien avez-vous d'argent dans votre portefeuille ? "))
store_items = {
  "chaussures": 50.0,
  "chemise": 20.0,
  "pantalon": 30.0,
  "ceinture": 15.0,
  "chapeau": 10.0,
  "écharpe": 25.0
}
affordable_items = []
for item, price in store_items.items():
  if price <= wallet:
    affordable_items.append(item)
affordable_items.sort()
if not affordable_items:
  print("Nothing")
else:
  print(affordable_items)
