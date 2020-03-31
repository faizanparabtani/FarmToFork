import mysql.connector

connection = mysql.connector.connect(host="remotemysql.com",user="R6vLKAaC04",passwd="5RkA8NFFSU",database="R6vLKAaC04" )
cursor = connection.cursor()

query_select = "SELECT * FROM sms_in WHERE 1"
cursor.execute(query_select)
res = cursor.fetchall()

for i in res:
    message = i[0]
    final = message.lstrip('8YCBH')
    final_message = final.split(' ')
    farmer_id = final_message[1]
    vegetable_name = final_message[2]
    quantity = final_message[3]
    query_check = "SELECT * FROM farmer_stock WHERE farmer_id=%s AND vegetable_name=%s AND quantity_available=%s;"
    cursor.execute(query_check, (farmer_id,vegetable_name,quantity,))
    counter = cursor.fetchall()
    count = len(counter)
    query_get_id = "SELECT v_id FROM vegetable WHERE v_name=%s;"
    cursor.execute(query_get_id, (vegetable_name,))
    v_id = cursor.fetchall()
    veg_id = v_id[0]
    final_id = veg_id[0]
    if count < 1:
        query_insert = "INSERT INTO farmer_stock (farmer_id, vegetable_name, vegetable_id, quantity_available) VALUES (%s,%s,%s,%s);"
        cursor.execute(query_insert, (farmer_id, vegetable_name, final_id, quantity, ))

connection.commit()
connection.close()
