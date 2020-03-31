import mysql.connector
import pycurl
from urllib.parse import urlencode
import json

try:
    from io import BytesIO
except ImportError:
    from StringIO import StringIO as BytesIO

buffer = BytesIO()

connection = mysql.connector.connect(host="remotemysql.com",user="R6vLKAaC04",passwd="5RkA8NFFSU",database="R6vLKAaC04" )
cursor = connection.cursor(buffered=True)

query_display = "SELECT v_id, v_name, farmer_v_price FROM vegetable";
crl_send = pycurl.Curl()
cursor.execute(query_display)
vegetable_display = cursor.fetchall()
# send_name = urlencode('FarmToTable')
# send_info = urlencode(vegetable_display)
send_data = {"api_key": 'E4GV++pRNXA-Azk2mx2PIHKVsJ7mBejDrV9RGhV0Ts',"numbers": 918169611905, "message" : vegetable_display}
final_data = urlencode(send_data)
crl_send.setopt(crl_send.URL, 'https://api.textlocal.in/send/')
crl_send.setopt(crl_send.POST, True)
crl_send.setopt(crl_send.POSTFIELDS, final_data)
crl_send.setopt(crl_send.WRITEDATA, buffer)
result = crl_send.perform()
print(result)
