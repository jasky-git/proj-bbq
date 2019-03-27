Run the 3 SQL files in the following sequences to create 3 databases:
inventory > bbqorder > bbqpayment


Service URL to change:

order_query.html -> change service URL to "http://xxxxxxxx:8085/querynow?{orderid}&{email}"
orders.html -> change service URL to "http://xxxxxx:8087/orders"
payment_sucess -> change service URL to "http://XXXXXX:8087/ordersdone"

scripts.js ->change these 3 service URL to "http://xxxxxxx:8087/orderdetails"
			"		to "http://xxxxxx:8080/inventory"
					to "http://xxx:8081/payment"