import os
import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode
import datetime
try:
   mySQLconnection = mysql.connector.connect(host='localhost',
                             database='skripsi',
                             user='root',
                             password='')
   sql_select_Query = "select * from files"
   cursor = mySQLconnection .cursor()
   cursor.execute(sql_select_Query)
   records = cursor.fetchall()
   for row in records:
     file = str(row[2])
     # if file dihapus
     if(row[10] == 1):
      ssh = 'sshpass -p indomiegoreng123! '
      scp = 'scp /var/www/html/backup/' + file + ' root@157.230.42.44:/var/www/html/Tugas-Akhir/storage/app/'
      command = ssh + scp
      transfer = os.system(command)
      ts = datetime.datetime.now().timestamp()
      time = datetime.datetime.fromtimestamp(ts).isoformat()
      new_time = time.replace('T', ' ')
      time = new_time[:19]
      update = "update files set `modif` = 0 where id = " + str(row[0])
      cursor.execute(update)
      insert = "insert into logs (`user_id`, `file_id`, `execution`, `duration`, `created_at`) values (0, "+str(row[0])+", 5, '-', '" + str(time)+"')"
      cursor.execute(insert)
      mySQLconnection.commit()
     # if file mod
     elif(row[12] == 1):
      ssh = 'sshpass -p indomiegoreng123! '
      scp = 'scp /var/www/html/backup/' + file + ' root@157.230.42.44:/var/www/html/Tugas-Akhir/storage/app/'
      command = ssh + scp
      transfer = os.system(command)
      ts = datetime.datetime.now().timestamp()
      time = datetime.datetime.fromtimestamp(ts).isoformat()
      new_time = time.replace('T', ' ')
      time = new_time[:19]
      update = "update files set `delete` = 0 where id = " + str(row[0])
      cursor.execute(update)
      insert = "insert into logs (`user_id`, `file_id`, `execution`, `duration`, `created_at`) values (0, "+str(row[0])+", 6, '-', '" + str(time)+"')"
      cursor.execute(insert)
      mySQLconnection.commit()
   cursor.close()  
except Error as e :
    print ("Error while connecting to MySQL", e)
finally:
    #closing database connection.
    if(mySQLconnection .is_connected()):
        mySQLconnection.close()
        print("MySQL connection is closed")