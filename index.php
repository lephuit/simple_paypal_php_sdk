<?php
include("config.php");
echo "API Testing<br />";


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

echo "<br /><br />";





/*
//This is an example of how to use the getBalance API
$balance = new GetBalance();
$result = $balance->setVersion("60.0")->execute();
print_r($result);
*/

?>