import pycurl
from urllib.parse import urlencode


api_key = 'E4GV++pRNXA-Azk2mx2PIHKVsJ7mBejDrV9RGhV0Ts'
inbox_id = '10'

data = {"api_key": 'E4GV++pRNXA-Azk2mx2PIHKVsJ7mBejDrV9RGhV0Ts',"inbox_id": '10'}
send = urlencode(data)
crl = pycurl.Curl()

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
body = buffer.getvalue()
# print(body)
# print(type(body))
final = body.decode()
print(type(final))
print(final)
crl.close()
