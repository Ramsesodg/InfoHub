#########exercice 1###########
chaine=(input("entrer un mot:"))
if len(chaine)<= 10:
    print("chaine pas assez longue")
elif len(chaine)  > 10:
    print("chaine trop longue")
else:
    print("First character:", chaine[0])
    print("Last character:", chaine[-1])
  
    for i in range(len(chaine)):
     print(chaine[i])    
    
    #########exercice 2###########
    chaine=(input("entrer un text:"))
    print(chaine[0]+ chaine[-1])
    
    
    #########exercice 2###########
        