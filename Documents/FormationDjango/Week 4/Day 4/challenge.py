  ########exercice 1########
matrix = """
7i3
Tsi
h%x
i #
sM 
$a 
#t%
^r!
"""
rows = matrix.split("\n")
num_cols = len(rows[0])
decoded = []

for col_index in range(num_cols):
    column = ""
    for row in rows:
        if col_index < len(row):
            column += row[col_index]
        else:
            column += " "
    decoded.append(column)
decoded_message = "".join(decoded)
print(decoded_message)
