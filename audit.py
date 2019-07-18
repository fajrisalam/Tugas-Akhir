import os
import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode
import datetime;
try:
   mySQLconnection = mysql.connector.connect(host='178.128.80.206',database='skripsi',user='buaya',password='sembarang12')
   sql_select_Query = "select * from files"
   cursor = mySQLconnection .cursor()
   cursor.execute(sql_select_Query)
   records = cursor.fetchall()
   for row in records:
     file = 'storage/app/' + row[2]
     sha = row[9]

     is_exist = os.path.isfile(file)
     # if file tidak ada
     if(is_exist == False):
      update = "update files set lost = 1 where id = " + str(row[0])
      cursor.execute(update)
      ts = datetime.datetime.now().timestamp()
      time = datetime.datetime.fromtimestamp(ts).isoformat()
      new_time = time.replace('T', ' ')
      time = new_time[:19]
      insert = "insert into logs (`user_id`, `file_id`, `execution`, `duration`, `created_at`) values (0, "+str(row[0])+", 4, '-', '" + str(time)+"')"
      cursor.execute(insert)
      mySQLconnection.commit()
     # if file ada
     else:
       checksum = "sha256sum " + file
       process = os.popen(checksum).read()
       cc = process.split()[0]
       if(cc != sha):
        update = "update files set modif = 1 where id = " + str(row[0])
        cursor.execute(update)
        ts = datetime.datetime.now().timestamp()
        time = datetime.datetime.fromtimestamp(ts).isoformat()
        new_time = time.replace('T', ' ')
        time = new_time[:19]
        insert = "insert into logs (`user_id`, `file_id`, `execution`, `duration`, `created_at`) values (0, "+str(row[0])+", 5, '-', '" + str(time)+"')"
        cursor.execute(insert)
        # file belum dihapus ingat ini
        mySQLconnection.commit()
   cursor.close()
except Error as e :
    print ("Error while connecting to MySQL", e)
finally:
    #closing database connection.
    if(mySQLconnection .is_connected()):
        mySQLconnection.close()
        print("MySQL connection is closed")