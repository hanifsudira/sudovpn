from flask import Flask, render_template, json, request, session, redirect, url_for, escape
from flask.ext.mysql import MySQL
from werkzeug import generate_password_hash, check_password_hash
import requests
mysql = MySQL()
app = Flask(__name__)

app.secret_key = 'super secret key'

# MySQL configurations
app.config['MYSQL_DATABASE_HOST'] = 'localhost'
app.config['MYSQL_DATABASE_USER'] = 'root'
app.config['MYSQL_DATABASE_PASSWORD'] = 'awanpanasgila'
app.config['MYSQL_DATABASE_DB'] = 'sudovpn'
mysql.init_app(app)


@app.route('/')
def main():
	return render_template('index.html')

@app.route('/showSignUp')
def showSignUp():
	return render_template('signup.html')

@app.route('/sucess')
def sucess():
	return render_template('sucess.html')


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



@app.route('/signUp',methods=['POST'])
def signUp():
	try:
		_name = request.form['inputName']
		_email = request.form['inputEmail']
		_password = request.form['inputPassword']

		# validate the received values
		if _name and _email and _password:
			
			# All Good, let's call MySQL
			
			conn = mysql.connect()
			cursor = conn.cursor()
			_hashed_password = generate_password_hash(_password)
			cursor.callproc('sp_createUser',(_name,_email,_hashed_password))
			data = cursor.fetchall()

			if len(data) is 0:
				conn.commit()
				return redirect('/sucess')
			else:
				return render_template('error.html',error = str(data[0]))
		else:
			return render_template('error.html',error = '<span>Enter the required fields</span>')

	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		conn.close()

@app.route('/showSignin')
def showSignin():
	if session.get('user'):
		return render_template('userHome.html')
	else:
		return render_template('signin.html')

@app.route('/userHome')
def userHome():
	if session.get('user'):
		return render_template('userHome.html')
	else:
		return render_template('error.html',error = 'Unauthorized Access')


@app.route('/logout')
def logout():
	session.pop('user',None)
	return redirect('/')

# @app.route('/validateLogin',methods=['POST'])
# def validateLogin():
# 	try:
# 		_username = request.form['user[email]']
# 		_password = request.form['user[password]']
#
#
# 		# connect to mysql
#
# 		con = mysql.connect()
# 		cursor = con.cursor()
# 		cursor.callproc('SP_Login',(_username,_password))
# 		data = cursor.fetchall()
#
# 		if len(data) > 0:
# 			return redirect('http://sudovpn.id/home/dashboard_client')
# 		else:
# 			return redirect('http://sudovpn.id/home/login')
#
#
# 	except Exception as e:
# 		return redirect('http://sudovpn.id/home/login')
# 	finally:
# 		cursor.close()
# 		con.close()

@app.route('/validateLogin',methods=['POST'])
def validateLogin():
	try:
		_username = request.form['user[email]']
		_password = request.form['user[password]']


		# connect to mysql

		con = mysql.connect()
		cursor = con.cursor()
		cursor.callproc('SP_Login',(_username,_password))
		data = cursor.fetchall()

		if len(data) > 0:
			wishes_dict = []
			for data in wishes:
				wish_dict = {
							'id_user': str(data[0]),
							'email': data[1],
				}
				wishes_dict.append(wish_dict)

			url = 'http://sudovpn.id/home/logins'
			headers = {'Content-Type': 'application/json', 'Accept':'application/json'}
			r = requests.post(url,data=json.dumps(wishes_dict), headers=headers)

			return r.content
		else:
			return redirect('http://sudovpn.id/home/login')


	except Exception as e:
		return redirect('http://sudovpn.id/home/login')
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
		cursor.callproc('SP_Register',(_name,_email,_phone,_address,_passwd))
		data = cursor.fetchall()

		if len(data) is 0:
			con.commit()
			return redirect('http://sudovpn.id/home/login')
		else:
			return redirect('http://sudovpn.id/home/register')


	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

if __name__ == "__main__":
	app.run(host='0.0.0.0',port=5002)
