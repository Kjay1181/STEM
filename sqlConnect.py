import MySQLdb

db = MySQLdb.connect(host="localhost", user="user", passwd="password",
db="school")

cur = db.cursor(MySQLdb.cursors.DictCursor)

db.autocommit(True)

cursor = conn.cursor()
cursor.execute('SELECT * FROM students')

for row in cursor:
    print(row)
