Run the 3 SQL files in the following sequences to create 3 databases:
inventory > bbqorder > bbqpayment


Service URL to change:

menu.html -> change service URL to http://xxxxxx:8080/inventory"
order_query.html -> change service URL to "http://xxxxxxxx:8087/query?orderid=${order}&email=${email}"
orders.html -> change service URL to "http://xxxxxx:8087/orders"		
		
payment_success -> change service URL to "http://XXXXXX:8087/ordersdone"

scripts.js ->change these 3 service URL to "http://xxxxxxx:8087/orderdetails"
			"		to "http://xxxxxx:8080/inventory"
					to "http://xxx:8081/payment"

For tibco mirco svc, pls change for orders.module -> resources -> HttpClientResource1.httpClientResource: change "default host" to ur machine's name i.e. LAPTOP-H9NKRSOK

*Note: SendMail Activity in orders microservice only works when connected to SMU internet.

When using the UI,
At order_details.html, when entering card for payment, pls enter "4242 4242 4242 4242" for card number, any values for the rest of the inputs as it is in testing mode.
