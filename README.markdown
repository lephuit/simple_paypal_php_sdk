# Unofficial PayPal PHP Object Oriented SDK by [Jason Michels] (http://thebizztech.com/)

I am building a simple PHP SDK to use with PayPal.

In the classes/packages/paypal/PPConfig.php file that is included there are a number of settings you should set.  There is an API username, password, and signature you must get from your PayPal account and enter it here.

Here are some examples of how to use these classes such as the ones I used in views/wpp/ddp/hardcoded.php.

Example of DoDirectPayment credit card processing API:

	<?php
	include("include.php");
	echo "API Testing<br />";

	//Create new instance of DoDirectPayment. Keep in mind all information used here is fake.
	$wpp = new PPDoDirectPayment();
	$result = $wpp
				->setVersion("80.0")
				->setIP("192.168.0.1")
				->setPaymentAction()
				->setCreditCard(array(
					"creditcardtype" 	=> "Visa", 
					"acct" 				=> "4322713247967434", 
					"expdate" 			=> "102013", 
					"cvv2" 				=> "123"
				))
				->setName(array(
					"first" => "Jason", 
					"last" 	=> "Michels"
				))
				->setAddress(array(
					"street" 		=> "123 Main St", 
					"city" 			=> "Papillion", 
					"state" 		=> "NE", 
					"zip" 			=> "68046", 
					"countrycode" 	=> "US"
				))
				->setAmt("3.70")
				->execute();

	print_r($result);