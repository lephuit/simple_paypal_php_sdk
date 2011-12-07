<?php 
/*
This works for setting up a billing agreement to use with reference transactions.  Do an authorization all the way through express checkout and a billing agreement will be returned

$result = $setEc
	->setVersion()
	->setReturnUrl("http://localhost/")
	->setCancelUrl("http://localhost/")
	->setPaymentRequest(array(
	    array(
	        "AMT" => "1.00", 
	        "CURRENCYCODE" => "USD",
	        "PAYMENTACTION" => "Authorization"
	       	)
		))
		->setBillingAgreementDetails(array(
	    array(
	        "L_BILLINGTYPE" => "MerchantInitiatedBilling", 
	        "L_BILLINGAGREEMENTDESCRIPTION" => "Test EC payment"
	       	)
		))
	->execute();
*/


$cmd = null;
if($_GET){ $cmd = $_GET['cmd']; }

include("include.php");
include("views/header.php");
include("views/main/top_nav.php");

?>

<div class="container">

	<?php 
	if($cmd == null)
	{ 
		include("views/main/set_ec_start.php");
	}

	//These are for Set Express Checkout API
	if($cmd == "run_hardcode")
	{
		echo '<div class="section white">';
		$setEc = new \PayPal\SetExpressCheckout();
		$result = $setEc
						->setVersion()
	                    ->setReturnUrl("http://localhost/")
	                    ->setCancelUrl("http://localhost/")
	                    ->setPaymentRequest(array(
		                    array(
			                    "AMT" => "1.00", 
			                    "CURRENCYCODE" => "USD",
			                    "PAYMENTACTION" => "Authorization"
			                   	)
	                   	))
	                   	->setBillingAgreementDetails(array(
		                    array(
			                    "L_BILLINGTYPE" => "MerchantInitiatedBilling", 
			                    "L_BILLINGAGREEMENTDESCRIPTION" => "Test EC payment"
			                   	)
	                   	))
	                    ->execute();

		include("views/result.php");
		echo "<br />";
		echo "Redirect <a href='https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=".$result['TOKEN']."'>https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=".$result['TOKEN']."</a>";
		echo "</div>";
	}

	?>
</div>
<?php
include("views/footer.php");
//End of index.php