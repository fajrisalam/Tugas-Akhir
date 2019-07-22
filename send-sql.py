import os
import paramiko
from paramiko import SSHClient
from scp import SCPClient

# membuat SSH client
def createSSHClient(server, port, user, password):
    client = paramiko.SSHClient()
    client.load_system_host_keys()
    client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    client.connect(server, port, user, password)
    return client

ssh = createSSHClient('128.199.64.128', '22', 'root', 'daniarggkk')
scp = SCPClient(ssh.get_transport())
src = '/var/www/html/backup/'
dst = '/var/www/html/backup/sql/'
scp.put(src, recursive=True, remote_path=dst)