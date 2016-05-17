from flask import Flask
from flask.ext.mysql import MySQL

# MySQL configurations
app = Flask(__name__)
app.config['MYSQL_DATABASE_HOST'] = 'localhost'
app.config['MYSQL_DATABASE_USER'] = 'root'
app.config['MYSQL_DATABASE_PASSWORD'] = 'awanpanasgila'
app.config['MYSQL_DATABASE_DB'] = 'sudovpn'
mysql = MySQL(app)

@app.route('/')
def index():
	cursor = mysql.connection.cursor()
	cursor.execute("SELECT * FROM USER WHERE id_user=1")
	
	data = cursor.fetchone()
	if data is None:
		return "Username or Password is wrong"
    return "Logged in successfully"

@app.route('/validateNewMessage',methods=['POST'])
def validateNewPacket():
	try:
		_id_from= request.form['from']
		_id_to= request.form['id_to']
		_subject= request.form['subject']
		_message= request.form['message']
		


		# connect to mysql

		if _idfrom and _id_to and _subject and _message :
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

@app.route('/listallInbox/<string:page_id>',methods=['GET'])
def listallInbox(page_id):
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
						
						
						
			}
			wishes_dict.append(wish_dict)

		return json.dumps(wishes_dict)
	except Exception as e:
		return json.dumps({'error':str(e)})
	finally:
		cursor.close()
		con.close()

if __name__ == "__main__":
	app.run(debug=True,host='0.0.0.0',port=5003)