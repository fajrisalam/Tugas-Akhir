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
            dst = '/var/www/html/Tugas-Akhir/storage/app/'
            scp.put(src, dst)
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
            src = '/var/www/html/backup/' + str(row[2])
            dst = '/var/www/html/Tugas-Akhir/storage/app/'
            scp.put(src, dst)
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