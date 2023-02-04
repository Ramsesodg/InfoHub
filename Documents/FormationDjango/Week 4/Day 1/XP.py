########exercice 1########

print("hello world\n"*4);

########exercice 2###########
print((99^3)*8);

#########exercice 3###########
#53 #sortie false
#3 == 3 #sortie true
#3 == "3" #sortie false
#"3" > 3 #sortie false
#"hello" == "hello" #sortie true

#########exercice 4###########
computer_brand="Mac"
print("Ihave a" +computer_brand+ "Compter")

#########exercice 5###########

name="yasmine"
age=22
shoe_size=37
infos="je suis"+ name + "agé de" + str(age) + "et je porte du" + str(shoe_size) + "comme pointure" 
print(infos)

#########exercice 6###########
a=6
b=2
if a> b:
    print("hello world")
#########exercice 7###########
n= int(input("entrer un nombre:"))
if(n % 2 == 0):
    print("n est paire")
else   :
    print("n est impaire")
         
#########exercice 8###########
mon_nom="yasmine"
son_nom=(input("entrer un nom:"))
if mon_nom!=son_nom:
      print("nous sommes pas des homonymes")
else:
          print("vous etes mon homoyme")
 #########exercice 9###########     

taillePouces = input("Entrez votre taille en pouces : ")
tailleCm = int(taillePouces) * 2.54  # Conversion de pouces en cm

if tailleCm > 145:
  print("Vous êtes assez grand pour rouler !")
else:
  print("Vous devez grandir un peu plus pour rouler.")
  print("grandir un peu pour roulez ")  
          
        



       
