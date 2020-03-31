# Farm To Fork
This was an idea which was implemented for Internal Smart India Hackathon 2020

# Concept
This idea is based on taking produce from farmers and trying to deliver it to consumers
hence cutting the number of middlemen resulting into better profit for the farmers.

## There are three main entities involved
1) Farmer
2) Center(Courier)
3) Customer

To tackle the technological divide scripts are implemented in python which:
1) Automate the process of Receiving Farmers stock and uploading it to the database
2) Send details of the ongoing prices to the Farmer

Hence Farmer can just send an sms to the dedicated number and their stock is recorded.
We have used the services of Textlocal in this case.

The scripts can be instructed to run at specific intervals by the task scheduler/cron

## Process
The Farmer sends the message of their stock.
The details are stored in the database which include Farmer's name, Phone number, Stock(Vegetable, Kg available)
These details are then picked up by the center and the center confirms the order by calling the farmer.
Truck services are deployed to the farm, the produce then delivered to the center.
Customer placed orders are then considered and couriers are assigned likewise.

# Automation Script
The process of automating the message receiving and delivery message was made by using the python script grep.py
1) The script checks for New Messages in the inbox.
2) If a message has body saying '1' it will send all the details of the vegetables and their prices.
3) If a message has a body other than 1 it will segregate and insert into database the appropriate fields.
4) There has to be a format maintained while sending the message to the registered number.

## API's Integrated
Paytm Gateway API  
Google Captcha API  
Google Translator  
Google Live Chat API  
Textlocal API  
Phpmailer  
