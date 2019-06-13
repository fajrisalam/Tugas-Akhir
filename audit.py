import os
import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode
try:
   mySQLconnection = mysql.connector.connect(host='localhost',
                             database='skripsi',
                             user='root',
                             password='')
   sql_select_Query = "select * from files"
   cursor = mySQLconnection .cursor()
   cursor.execute(sql_select_Query)
   records = cursor.fetchall()
   while True:
	   for row in records:
	       file = 'storage\\app\\' + row[2]
	       sha = row[9]
	       checksum = "sha256sum.exe " + file
	       process = os.popen(checksum).read()
	       cc = process.split()[0]
	       if(cc[1:] != sha):
	       		update = "update files set modif = 1 where id = 18" 
	       		cursor.execute(update)
	       		mySQLconnection.commit()
   cursor.close()  
except Error as e :
    print ("Error while connecting to MySQL", e)
finally:
    #closing database connection.
    if(mySQLconnection .is_connected()):
        mySQLconnection.close()
        print("MySQL connection is closed")