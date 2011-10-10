<?php
include("pp_config.php");
echo "API Testing<br />";


$wpp = new PP_dodirectpayment();
$result = $wpp
			->set_version("60.0")
			->set_ip("192.168.0.1")
			->set_paymentaction()
			->set_creditcard(array("creditcardtype" => "Visa", "acct" => "4683075410516684", "expdate" => "102015", "cvv2" => "123"))
			->set_name(array("first" => "Jason", "last" => "Michels"))
			->set_address(array("street" => "123", "city" => "Papillion", "state" => "NE", "zip" => "68046", "countrycode" => "US"))
			->set_amt("10.25")
			->execute();

print_r($result);

echo "<br /><br />";





/*
//This is an example of how to use the getBalance API
$balance = new PP_getbalance();
$result = $balance->set_version("60.0")->execute();
print_r($result);
*/

?>