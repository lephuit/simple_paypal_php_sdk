<?php 
//Skipe DoExpressCheckoutPayment if doing a create recurring without initial sale
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
		include("views/main/create_recurring_profile_start.php");
	}

	//These are for CreateRecurringPaymentsProfile API
	if($cmd == "run_hardcode")
	{
		echo '<div class="section white">';
		$recur = new \PayPal\CreateRecurringPaymentsProfile();
		$result = $recur
	                    ->setVersion()
	                    ->setToken("EC-3L1958095K519301S")
	                    ->setProfileStartDate(date('c', mktime(1, 2, 3, date("m"), date("d")+1, date("Y"))))
	                    ->setDesc("First Test EC payment")
	                    ->setBillingPeriod("Day")
	                    ->setBillingFrequency("1")
	                    ->setTotalBillingCycles("5")
	                    ->setAmt("1.00")
	                    ->setCurrencyCode()
	                    ->setName(array(
		                    "first" => "Jason", 
		                    "last" => "Michels",
		                    "email" => "buyer_1318871412_per@paypal.com"
	                   	))
	                   	->setAddress(array(
							"street" 		=> "123", 
							"city" 			=> "Papillion", 
							"state" 		=> "NE", 
							"zip" 			=> "68046", 
							"countrycode" 	=> "US"
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