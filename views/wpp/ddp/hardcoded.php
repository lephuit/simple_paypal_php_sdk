<div class="section white">

<?php
//This is used to run the hardcoded nvp dodirectpayment request
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
				"street" 		=> "123", 
				"city" 			=> "Papillion", 
				"state" 		=> "NE", 
				"zip" 			=> "68046", 
				"countrycode" 	=> "US"
			))
			->setAmt("3.70")
			->execute();

include("views/wpp/ddp/result.php");
	

?>
</div>