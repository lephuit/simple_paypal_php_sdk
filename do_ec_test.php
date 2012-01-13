<?php 

//Active billing agreement created 12/7/2011 
//BILLINGAGREEMENTID ===> B-2A343947K8102981J
//12/7/2011 === B-6U1370943C441603J
//12/7/2011 === B-77G72972VA7999611 token EC-7GU06069JR019533Y

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
		include("views/main/do_ec_start.php");
	}

	//These are for DoExpressCheckout API
	if($cmd == "run_hardcode")
	{
		echo '<div class="section white">';
		$doec = new \PayPal\DoExpressCheckoutPayment();
		$result = $doec
	                    ->setVersion()
	                    ->setToken("EC-0JL2481727803893U")
	                    ->setPayerId("9Z34DN6WF2EZE")
	                    ->setPaymentRequest(array(
		                    array(
			                    "AMT" => "10.00", 
			                    "CURRENCYCODE" => "USD",
			                    "PAYMENTACTION" => "Order"
			                   	)
	                   	))
	                    ->execute();

		include("views/result.php");
		echo "</div>";
	}

	?>
</div>
<?php
include("views/footer.php");
//End of index.php