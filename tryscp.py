import paramiko
from scp import SCPClient

def createSSHClient(server, port, user, password):
    client = paramiko.SSHClient()
    client.load_system_host_keys()
    client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    client.connect(server, port, user, password)
    return client



ssh = createSSHClient('157.230.42.44', '22', 'root', 'indomiegoreng123!')
scp = SCPClient(ssh.get_transport())
scp.get(r'/var/www/html/backup/2.dat', r'/2.dat')