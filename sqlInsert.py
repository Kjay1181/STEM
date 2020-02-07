import MySQLdb

db = MySQLdb.connect("localhost","user","password","students")

db.autocommit(True)#allows transtion to commit


cursor = db.cursor(MySQLdb.cursors.DictCursor)

name = input("Please enter student's name: ")

age = input("Please enter student's age: ")

gradeLevel = input("Please enter student's gradeLevel: ")

sql = f"INSERT INTO students(name,age,gradeLevel) VALUES('{name}',{age}, {gradeLevel})"
sqlTwo = "SELECT * from students"

cursor.execute(sql)
cursor.execute(sqlTwo)


rows = cursor.fetchall()

for row in rows:
	print("NAME:" + " "+ row['name'] + " "+ "Age:" + " "+ str(row['age']) +" "+  "Grade:"+ " "+ str(row['gradeLevel']))
	print(type(age))
#prints the database
cursor.close()

db.close()

