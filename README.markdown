# Unofficial PayPal PHP Object Oriented SDK by Jason

I am building a simple PHP SDK to use with PayPal that takes advantage of many PHP 5.3 features such as static function calls. [*http://thebizztech.com*](http://thebizztech.com/) by [Jason Michels] (http://thebizztech.com/).

Here are some examples of how to use these classes.

Example of DoDirectPayment credit card processing API:

	<?php
	include("config.php");
	echo "API Testing<br />";

	//Create new instance of DoDirectPayment. Keep in mind all information used here is fake.
	$wpp = new DoDirectPayment();
	$result = $wpp
				->setVersion("60.0")
				->setIP("192.168.0.1")
				->setPaymentAction()
				->setCreditCard(array("creditcardtype" => "Visa", "acct" => "4683075410516684", "expdate" => "102015", "cvv2" => "123"))
				->setName(array("first" => "Jason", "last" => "Michels"))
				->setAddress(array("street" => "123", "city" => "Papillion", "state" => "NE", "zip" => "68046", "countrycode" => "US"))
				->setAmt("3.60")
				->execute();

	print_r($result);
	/* End of index.php */