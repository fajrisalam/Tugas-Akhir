from pexpect import pxssh
import os
import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode
import datetime

s = pxssh.pxssh()
hostname = '157.230.42.44'
username = 'root'
password = 'indomiegoreng123!'

def verify():
  src
try:
    mySQLconnection = mysql.connector.connect(host='localhost',database='skripsi',user='root',password='buayakecil')
    sql_select_Query = "select * from files where lost = 0 and modif = 0"
    cursor = mySQLconnection .cursor()
    cursor.execute(sql_select_Query)
    records = cursor.fetchall()
    try:
        s.login (hostname, username, password)
        for row in records:
          file = '/var/www/html/Tugas-Akhir/storage/app/' + row[2]
          sha = row[9]
          checksum = "sha256sum " + file
          s.sendline(checksum)
          print(s.before)
        # s.sendline ('uptime')   # run a command
        # s.prompt()             # match the prompt
        # print(s.before)
        s.logout()
    except pxssh.ExceptionPxssh as e:
        print("pxssh failed on login.")
        print(str(e))
except Error as e :
    print ("Error while connecting to MySQL", e)
finally:
    #closing database connection.
    if(mySQLconnection .is_connected()):
        mySQLconnection.close()
        print("MySQL connection is closed")