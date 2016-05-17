import paramiko
import os

paramiko.util.log_to_file('paramiko.log')

#open transport
host = "128.199.103.121"
port = 22
transport = paramiko.Transport((host, port))

#auth
user = "root"
pasw = "openvpn01"
transport.connect(username = user, password = pasw)

#connect
sftp = paramiko.SFTPClient.from_transport(transport)

#download dari ovpn ke sudo
filepath = "/root/tesst/tes.txt" # file remote
localpath = "/root/hasildo.txt"  # file hasil download
sftp.get(filepath,localpath)

#download dari sudo ke user || using flask


#hapus file
os.system('rm /root/hasildo.txt')

# Close
sftp.close()
transport.close()
