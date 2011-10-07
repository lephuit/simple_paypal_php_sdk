<?php
include("pp_config.php");
echo "API Testing<br />";


/*Example of DoDirectPayment API Call
$wpp = new PP_do_direct_pay();
$result = $wpp
			->set_version("60.0")
			->set_ip("192.168.0.1")
			->set_paymentaction()
			->set_creditcard(array("creditcardtype" => "Visa", "acct" => "4683075410516684", "expdate" => "102015", "cvv2" => "123"))
			->set_name(array("first" => "Jason", "last" => "Michels"))
			->set_address(array("street" => "123", "city" => "Papillion", "state" => "NE", "zip" => "68046", "countrycode" => "US"))
			->set_amt("10.25")
			->execute();



if(isset($result['pre_pay_error']))
{
	echo "There was an error with your request.  These fields below are required:<br />";
	foreach($result['fields'] as $field)
	{
		echo "--- ".$field."<br />";
	}
}
else
{
	//You were able to connect to PayPal now just check the response
	print_r($result);
}
*/

$balance = new PP_get_balance();
$result = $balance->set_version("60.0")->execute();
print_r($result);

?>