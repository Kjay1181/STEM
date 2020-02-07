import MySQLdb

db = MySQLdb.connect("192.168.0.131","kevdav21","davis","kevdav21")

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

