import os
import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode
import datetime
import paramiko
from paramiko import SSHClient
from scp import SCPClient

def createSSHClient(server, port, user, password):
    client = paramiko.SSHClient()
    client.load_system_host_keys()
    client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    client.connect(server, port, user, password)
    return client

ssh = createSSHClient('157.230.42.44', '22', 'root', 'indomiegoreng123!')
scp = SCPClient(ssh.get_transport())

try:
    mySQLconnection = mysql.connector.connect(host='178.128.80.206',database='skripsi',user='buaya',password='sembarang12')     
    sql_select_Query = "select * from files"
    cursor = mySQLconnection .cursor()
    cursor.execute(sql_select_Query)
    records = cursor.fetchall()
    for row in records:
        # if file dihapus
        file = str(row[2])
        if(row[10] == 1):
            src = '/var/www/html/backup/' + str(row[2])
            print('modif '+str(row[2]))
        # if file mod
        elif(row[12] == 1):
            src = '/var/www/html/backup/' + str(row[2])
            print('modif '+str(row[2]))            
    cursor.close()  
except Error as e :
    print ("Error while connecting to MySQL", e)
finally:
    #closing database connection.
    if(mySQLconnection .is_connected()):
        mySQLconnection.close()
        print("MySQL connection is closed")