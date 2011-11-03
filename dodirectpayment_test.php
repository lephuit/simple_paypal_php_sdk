<?php 
$cmd = null;
if($_GET){ $cmd = $_GET['cmd']; }

include("include.php");
include("views/header.php");
include("views/main/top_nav.php");

/*
Here is an example of how to run a DoDirectPayment API call like the one in views/wpp/ddp/hardcoded.php
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
print_r($result);
*/
?>

<div class="container">

<?php 
if($cmd == null){ include("views/wpp/ddp/start.php"); }

//These are for DoDirectPayment API
if($cmd == "ddp_run_hardcode")
{
	include("views/wpp/ddp/hardcoded.php");
}

if($cmd == "ddp_run_form")
{
	include("views/wpp/ddp/run_form.php");
}
// End DoDirectPayment API

?>




</div>
<?php
include("views/footer.php");
//End of index.php