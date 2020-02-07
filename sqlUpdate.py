import MySQLdb

db = MySQLdb.connect(host="localhost", user="user", passwd="password",
db="school")

cur = db.cursor(MySQLdb.cursors.DictCursor)

db.autocommit(True)


sql = "UPDATE students SET name = 'kj' WHERE name = 'bob'"

cur.execute(sql)

db.commit()
cur.close()
db.close()

