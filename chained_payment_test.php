<?php 
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
		include("views/main/ddp_start.php");
	}

	//These are for DoDirectPayment API
	if($cmd == "ddp_run_hardcode")
	{
		echo '<div class="section white">';
		$wpp = new \PayPal\DoDirectPayment();
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

		include("views/result.php");
		echo "</div>";
	}

	?>
</div>
<?php
include("views/footer.php");
//End of index.php