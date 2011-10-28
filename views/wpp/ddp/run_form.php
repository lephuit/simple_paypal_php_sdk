<div class="section white">

<?php
//This is used to run the hardcoded nvp dodirectpayment request
$wpp = new PPDoDirectPayment();
$result = $wpp
			->setVersion("80.0")
			->setIP("192.168.0.1")
			->setPaymentAction($_POST['paymentaction'])
			->setCreditCard(array(
				"creditcardtype" 	=> $_POST['creditcardtype'], 
				"acct" 				=> $_POST['acct'], 
				"expdate" 			=> $_POST['expdate'], 
				"cvv2" 				=> $_POST['cvv2']
			))
			->setName(array(
				"first" => $_POST['first'], 
				"last" 	=> $_POST['last']
			))
			->setAddress(array(
				"street" 		=> $_POST['street'], 
				"city" 			=> $_POST['city'], 
				"state" 		=> $_POST['state'], 
				"zip" 			=> $_POST['zip'], 
				"countrycode" 	=> $_POST['countrycode']
			))
			->setAmt($_POST['amt'])
			->execute();

include("views/wpp/ddp/result.php");
	

?>
</div>