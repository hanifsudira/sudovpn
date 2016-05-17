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

if __name__ == "__main__":
	app.run(debug=True,host='0.0.0.0',port=5003)