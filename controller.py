from flask import Flask, render_template, json, request, session, redirect, url_for, escape
from flask.ext.mysql import MySQL
from werkzeug import generate_password_hash, check_password_hash
import requests
import pexpect
import paramiko
import os
from flask import send_from_directory
import pexpect

mysql = MySQL()
app = Flask(__name__)

app.secret_key = 'super secret key'

# MySQL configurations
app.config['MYSQL_DATABASE_HOST'] = 'localhost'
app.config['MYSQL_DATABASE_USER'] = 'root'
app.config['MYSQL_DATABASE_PASSWORD'] = 'awanpanasgila'
app.config['MYSQL_DATABASE_DB'] = 'sudovpn'
mysql.init_app(app)

def sum_(ip):
	ssh_newkey = 'Are you sure you want to continue connecting'
	p = pexpect.spawn('ssh root@'+ip+' python checkfile.py')
	i=p.expect([ssh_newkey,'password:',pexpect.EOF])

	if i==0:
		p.sendline('yes')
		i=p.expect([ssh_newkey,'password:',pexpect.EOF])
	if i==1:
		p.sendline("openvpn01")
		p.expect(pexpect.EOF)
	elif i==2:
		pass

	result = p.before

	p.close

	return result

def mkdir(username,ip):
	ssh_newkey = 'Are you sure you want to continue connecting'
	execute='ssh root@'+ip+' bash mkd.sh '+username
	p = pexpect.spawn(execute)
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

def create(folder,username,ip):
	ssh_newkey = 'Are you sure you want to continue connecting'
	execute='ssh root@'+ip+' bash create.sh '+folder+' '+username+' '
	p = pexpect.spawn(execute)
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
		print p.before
		print "berhasil"
	else:
		print "gagal"

	p.close

def revoke(folder,username,ip):
	ssh_newkey = 'Are you sure you want to continue connecting'
	execute='ssh root@'+ip+' bash create.sh '+folder+' '+username+' '
	p = pexpect.spawn(execute)
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


@app.route('/')
def main():
	return render_template('index.html')

@app.route('/tampil')
def tampil():
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_ListAllUser',())
		wishes = cursor.fetchall()

		wishes_dict = []
		for wish in wishes:
			wish_dict = {
						'id_user': str(wish[0]),
						'email': wish[1],
						'password': wish[2],
						'fullname': wish[3],
						'phone': wish[4],
						'address': wish[5],
						'status': str(wish[6]),
						'time': wish[7],
			}
			wishes_dict.append(wish_dict)

		url = 'http://sudovpn.id/admin/tampil'
		headers = {'Content-Type': 'application/json', 'Accept':'application/json'}
		r = requests.post(url,data=json.dumps(wishes_dict), headers=headers)

		return r.content

	except Exception as e:
		return render_template('error.html', error = str(e))
	finally:
		cursor.close()
		con.close()



@app.route('/listperid/<id>',methods=['GET'])
def listperid(id):
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_List_PerID',(str(id),))
		wishes = cursor.fetchall()

		wishes_dict = []
		for wish in wishes:
			wish_dict = {
						'id_user': str(wish[0]),
						'email': wish[1],
						'password': wish[2],
						'fullname': wish[3],
						'phone': wish[4],
						'address': wish[5],
						'status': str(wish[6]),
						'time': wish[7],
			}
			wishes_dict.append(wish_dict)
		return json.dumps(wishes_dict)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

@app.route('/delperid/<string:page_id>',methods=['GET'])
def delperid(page_id):
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_Del_PerID',(page_id,))
		wishes = cursor.fetchall()

		if len(wishes) is 0:
			con.commit()
			return redirect('http://sudovpn.id/admin/member')
		else:
			return redirect('http://sudovpn.id/admin/mail')
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()


@app.route('/listmember')
def listmember():
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_ListAllUser',())
		wishes = cursor.fetchall()

		wishes_dict = []
		for wish in wishes:
			wish_dict = {
						'id_user': str(wish[0]),
						'email': wish[1],
						'password': wish[2],
						'fullname': wish[3],
						'phone': wish[4],
						'address': wish[5],
						'status': str(wish[6]),
						'time': wish[7],
			}
			wishes_dict.append(wish_dict)

		return json.dumps(wishes_dict)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()


@app.route('/validateLogin',methods=['POST'])
def validateLogin():
	try:
		_username = request.form['user[email]']
		_password = request.form['user[password]']


		# connect to mysql

		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_Login',(_username,_password,))
		data = cursor.fetchall()

		if len(data) > 0:
			id_ = data[0][0]

			return redirect("http://sudovpn.id/home/logins/"+str(id_))

		else:
			return redirect('http://sudovpn.id/home/login')


	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()


@app.route('/validateRegister',methods=['POST'])
def validateRegister():
	try:
		_name= request.form['name']
		_email= request.form['email']
		_phone= request.form['phone']
		_address= request.form['address']
		_passwd= request.form['passwd']


		# connect to mysql

		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_Register',(_name,_email,_phone,_address,_passwd,))
		data = cursor.fetchall()

		if len(data) is 0:
			con.commit()
			mkdir(_email,'128.199.103.121')
			mkdir(_email,'188.166.224.66')
			return redirect('http://sudovpn.id/home/login')
		else:
			return redirect('http://sudovpn.id/home/register')


	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()


@app.route('/deletePacket/<string:page_id>',methods=['GET'])
def deletePacket(page_id):
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_Del_Packet',(page_id,))
		wishes = cursor.fetchall()

		if len(wishes) is 0:
			con.commit()
			return redirect('http://sudovpn.id/admin/paket')
		else:
			return redirect('http://sudovpn.id/admin/paket')
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()


@app.route('/listAllPacket')
def listAllPacket():
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_ListAllPacket',())
		wishes = cursor.fetchall()

		wishes_dict = []
		for wish in wishes:
			wish_dict = {
						'id_packet': str(wish[0]),
						'packet_name': wish[1],
						'max': str(wish[2]),
						'bandwidth': str(wish[3]),
						'parenting': wish[4],
						'harga': str(wish[5]),
						'life_time': str(wish[6]),
			}
			wishes_dict.append(wish_dict)

		return json.dumps(wishes_dict)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

@app.route('/listperPacket/<string:page_id>',methods=['GET'])
def listperPacket(page_id):
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_List_Packet_PerID',(page_id,))
		wishes = cursor.fetchall()

		wishes_dict = []
		for wish in wishes:
			wish_dict = {
						'id_packet': str(wish[0]),
						'packet_name': wish[1],
						'max': str(wish[2]),
						'bandwidth': str(wish[3]),
						'parenting': wish[4],
						'harga': str(wish[5]),
						'life_time': str(wish[6]),
			}
			wishes_dict.append(wish_dict)

		return json.dumps(wishes_dict)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

@app.route('/updateNewPacket',methods=['POST'])
def updateNewPacket():
	try:
		_id_packet= request.form['id']
		_nama= request.form['nama']
		_max= request.form['max']
		_bandwidth= request.form['bandwidth']
		_parenting= request.form['parenting']
		_life_time= request.form['life_time']
		_harga= request.form['harga']


		# connect to mysql

		if _nama and _max and _bandwidth and _parenting and _life_time and _harga:
			con = mysql.connect()
			cursor = con.cursor()
			cursor.callproc('SP_Update_Packet',(_id_packet,_nama,_max,_bandwidth,_parenting,_life_time,_harga,))
			data = cursor.fetchall()

			if len(data) is 0:
				con.commit()
				return redirect('http://sudovpn.id/admin/paket')
			else:
				return redirect('http://sudovpn.id/admin/edit_packet/'+_id_packet)

	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

@app.route('/updateUser',methods=['POST'])
def updateUser():
	try:
		_id_user = request.form['id_user']
		_fullname = request.form['fullname']
		_phone = request.form['phone']
		_address = request.form['address']

		# connect to mysql

		if _id_user and _fullname and _phone and _address:
			con = mysql.connect()
			cursor = con.cursor()
			cursor.callproc('SP_EditProfil',(_id_user,_fullname,_phone,_address,))
			data = cursor.fetchall()

			if len(data) is 0:
				con.commit()
				return redirect('http://sudovpn.id/client/profile')
			else:
				return redirect('http://sudovpn.id/client/edit')

	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()


@app.route('/listAllPacket_User/<string:page_id>',methods=['GET'])
def listAllPacket_User(page_id):
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_List_AllPacket_User',(page_id,))
		wishes = cursor.fetchall()

		wishes_dict = []
		for wish in wishes:
			wish_dict = {
						'id_list': str(wish[0]),
						'packet_name': wish[1],
						'start_time': wish[2],
						'stop_time': wish[3],
						'status': wish[4],
						'max': str(wish[5]),
			}
			wishes_dict.append(wish_dict)

		return json.dumps(wishes_dict)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

@app.route('/listPacket_perID/<string:page_id>',methods=['GET'])
def listPacket_perID(page_id):
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_List_PacketUser_PerID',(page_id,))
		wishes = cursor.fetchall()

		wishes_dict = []
		for wish in wishes:
			wish_dict = {
						'max': str(wish[0]),
						'id_list': str(wish[1]),
			}
			wishes_dict.append(wish_dict)

		return json.dumps(wishes_dict)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

@app.route('/listAllVPN/<string:page_id>',methods=['GET'])
def listAllVPN(page_id):
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_List_VPN',(page_id,))
		wishes = cursor.fetchall()

		wishes_dict = []
		for wish in wishes:
			wish_dict = {
						'id_vpn': str(wish[0]),
						'username': wish[1],
						'id_list': str(wish[2]),
						'date': wish[3],
						'max': str(wish[4]),
			}
			wishes_dict.append(wish_dict)

		return json.dumps(wishes_dict)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()


@app.route('/change_status_active/<string:page_id>',methods=['GET'])
def change_status_active(page_id):
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_Up_Status_PacketUser',(page_id,'Active',))
		data= cursor.fetchall()

		if len(data) is 0:
			con.commit()
			return redirect('http://sudovpn.id/admin/view/'+page_id)
		else:
			return redirect('http://sudovpn.id/admin/view/'+page_id)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

@app.route('/change_status_suspend/<string:page_id>',methods=['GET'])
def change_status_suspend(page_id):
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_Up_Status_PacketUser',(page_id,'Suspend',))
		data= cursor.fetchall()

		if len(data) is 0:
			con.commit()
			return redirect('http://sudovpn.id/admin/view/'+page_id)
		else:
			return redirect('http://sudovpn.id/admin/view/'+page_id)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

@app.route('/listallpackethome')
def listallpackethome():
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_List_TotalAllPacket',())
		wishes = cursor.fetchall()

		wishes_dict = []
		for wish in wishes:
			wish_dict = {
						'id_user': str(wish[0]),
						'packet_name': wish[1],
						'start_time': wish[2],
						'stop_time': wish[3],
						'status': wish[4],
						'max': str(wish[5]),
						
						
			}
			wishes_dict.append(wish_dict)

		return json.dumps(wishes_dict)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

		
@app.route('/change_user_suspend/<string:page_id>',methods=['GET'])
def change_user_suspend(page_id):
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_Update_StatusUser',(page_id,'Suspend',))
		data= cursor.fetchall()

		if len(data) is 0:
			con.commit()
			return redirect('http://sudovpn.id/admin/view/'+page_id)
		else:
			return redirect('http://sudovpn.id/admin/view/'+page_id)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()


@app.route('/validateNewVPN',methods=['POST'])
def validateNewVPN():
	try:
		_id_user= request.form['id_user']
		_username= request.form['username']
		_id_list= request.form['id_list']

		if _id_user:
			con = mysql.connect()
			cursor = con.cursor()
			cursor.callproc('SP_GetEmail',(_id_user,))
			temp = cursor.fetchall()
			_email = temp[0][0]

		# connect to mysql

		if _username and _id_list:
			#disini di cek
			ip=''
			ip1='128.199.103.121'
			ip2='188.166.224.66'
			c_ip1=int(sum_(ip1).strip())
			c_ip2=int(sum_(ip2).strip())
			print c_ip1
			print c_ip2

			if(c_ip1<c_ip2):
				ip=ip1
			else:
				ip=ip2

			con = mysql.connect()
			cursor = con.cursor()
			cursor.callproc('SP_Create_VPN',(_username,_id_list,ip,))
			data = cursor.fetchall()

			if len(data) is 0:
				create(_email,_username,ip)
				con.commit()
				return redirect('http://sudovpn.id/client/createVPN/'+_id_list)
			else:
				return redirect('http://sudovpn.id/client/createVPN/'+_id_list)

	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

@app.route('/beliPaket',methods=['POST'])
def beliPaket():
	try:
		_id_packet= request.form['id_packet']
		_id_user= request.form['id_user']

		# connect to mysql

		if _id_packet and _id_user:
			con = mysql.connect()
			cursor = con.cursor()
			cursor.callproc('SP_Beli_Packet',(_id_user,_id_packet,))
			data = cursor.fetchall()

			if len(data) is 0:
				con.commit()
				return redirect('http://sudovpn.id/client/myplan')
			else:
				return redirect('http://sudovpn.id/client/plans')

	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()


@app.route('/ListInbox_Admin/',methods=['GET'])
def ListInbox_Admin():
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_ListInbox_Admin',('0'))
		wishes = cursor.fetchall()

		wishes_dict = []
		for wish in wishes:
			wish_dict = {
						'id_list': str(wish[0]),
						'packet_name': wish[1],
						'sfrom flask import send_from_directorytart_time': wish[2],
						'stop_time': wish[3],
						'status': wish[4],
			}
			wishes_dict.append(wish_dict)

		return json.dumps(wishes_dict)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()


@app.route('/download_vpn/<string:page_id>',methods=['GET'])
def download_vpn(page_id):
	try:
		if page_id:
			con = mysql.connect()
			cursor = con.cursor()
			cursor.callproc('SP_Download_VPN',(page_id,))
			wishes= cursor.fetchall()
		for wish in wishes:
			username = wish[0]
			folder= wish[1]
			ip= wish[2]


		if username and folder:
			paramiko.util.log_to_file('/root/paramiko.log')

			#open transport
			host = ip
			port = 22
			transport = paramiko.Transport((host, port))

			#auth
			user = "root"
			pasw = "openvpn01"
			transport.connect(username = user, password = pasw)

			#connect
			sftp = paramiko.SFTPClient.from_transport(transport)

			#download dari ovpn ke sudo
			filepath = '/root/'+folder+'/'+username+'.ovpn' # file remote
			localpath = '/var/www/html/sudovpn/web/assets/file/'+username+'.ovpn'  # file hasil download
			sftp.get(filepath,localpath)

			# Close
			sftp.close()
			transport.close()
			#download dari sudo ke user || using flask
			#return send_from_directory(directory='/root/', filename=username+'.ovpn')
		return json.dumps({'username':username})

			#hapus file
			#os.system('rm /root/hasildo.txt')
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

@app.route('/delete_vpn/<string:page_id>',methods=['GET'])
def delete_vpn(page_id):
	try:
		localpath = '/var/www/html/sudovpn/web/assets/file/'+page_id+'.ovpn'  # file hasil download
		os.system('rm '+localpath)
		return json.dumps({'error':'Success'})
	except Exception as e:
		return json.dumps({'error':str(e)})


@app.route('/validateNewMessage',methods=['POST'])
def validateNewMessage():
	try:
		_id_from= request.form['from']
		_id_to= request.form['id_to']
		_subject= request.form['subject']
		_message= request.form['message']


		print _id_from+_id_to+_subject+_message

		# connect to mysql

		if _id_from and _id_to and _subject and _message :
			print 'masuk'
			con = mysql.connect()
			cursor = con.cursor()
			cursor.callproc('SP_NewMessage',(_id_from,_id_to,_subject,_message,))
			data = cursor.fetchall()

			if len(data) is 0:
				con.commit()
				return redirect('http://sudovpn.id/admin/compose')
			else:
				return redirect('http://sudovpn.id/admin/compose')

	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

@app.route('/listallInbox/<string:page_id>')
def listallInbox(page_id):
	print "masuk"
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_ListInbox',(page_id,))
		wishes = cursor.fetchall()

		wishes_dict = []
		for wish in wishes:
			wish_dict = {
						'fullname': wish[0],
						'subject': wish[1],
						'message': wish[2],
						'date': wish[3],
						'status': wish[4],
						'id_message': str(wish[5]),
						
						
						
			}
			wishes_dict.append(wish_dict)

		return json.dumps(wishes_dict)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()
@app.route('/listallSent/<string:page_id>')
def listallSent(page_id):
	print "masuk"
	try:
		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_ListSent',(page_id,))
		wishes = cursor.fetchall()

		wishes_dict = []
		for wish in wishes:
			wish_dict = {
						'fullname': wish[0],
						'subject': wish[1],
						'message': wish[2],
						'date': wish[3],
						'status': wish[4],
						
						
						
			}
			wishes_dict.append(wish_dict)

		return json.dumps(wishes_dict)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

if __name__ == "__main__":
	app.run(host='0.0.0.0',port=5002)