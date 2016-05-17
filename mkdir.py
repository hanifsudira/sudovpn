import pexpect

ssh_newkey = 'Are you sure you want to continue connecting'
p = pexpect.spawn('ssh root@128.199.103.121 bash mkd.sh tesst')
i=p.expect([ssh_newkey,'password:',pexpect.EOF])

if i==0:
    p.sendline('yes')
    i=p.expect([ssh_newkey,'password:',pexpect.EOF])
if i==1:
    p.sendline("openvpn01")
    p.expect(pexpect.EOF)
elif i==2:
    pass

if "1" in p.before:
    print "berhasil"
else:
    print "gagal"

p.close
