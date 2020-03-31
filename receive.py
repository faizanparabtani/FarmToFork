import mysql.connector
import pycurl
from urllib.parse import urlencode
import json

api_key = 'E4GV++pRNXA-Azk2mx2PIHKVsJ7mBejDrV9RGhV0Ts'
inbox_id = '10'

data = {"api_key": 'E4GV++pRNXA-Azk2mx2PIHKVsJ7mBejDrV9RGhV0Ts',"inbox_id": '10'}
send = urlencode(data)
crl = pycurl.Curl()
crl_send = pycurl.Curl()

try:
    from io import BytesIO
except ImportError:
    from StringIO import StringIO as BytesIO

buffer = BytesIO()

crl.setopt(crl.URL, 'https://api.textlocal.in/get_messages/')
crl.setopt(crl.POST, True)
crl.setopt(crl.POSTFIELDS, send)
crl.setopt(crl.WRITEDATA, buffer)
crl.perform()
message_byte = buffer.getvalue()
message_str = message_byte.decode()
message_dict = json.loads(message_str)
crl.close()


connection = mysql.connector.connect(host="remotemysql.com",user="R6vLKAaC04",passwd="5RkA8NFFSU",database="R6vLKAaC04" )
cursor = connection.cursor(buffered=True)


false = 0
true = 0
message_list = []
number_list = []
datetime_list = []


for i in message_dict["messages"]:
    try:
        message_list.append(i['message'])
        number_list.append(i['number'])
        datetime_list.append(i['date'])
    except KeyError:
        pass

for (i, j, k) in zip(message_list, number_list, datetime_list):
    print(i)
