<?php 
$cmd = null;
if($_GET){ $cmd = $_GET['cmd']; }

include("include.php");
include("views/header.php");
include("views/main/top_nav.php");

?>
<script src ="https://www.paypalobjects.com/js/external/dg.js" type="text/javascript"></script>

<div class="container">

	<?php 
	if($cmd == null)
	{ 
		include("views/main/adaptive_payment_start.php");
	}

	//These are for Adaptive Pay API
	if($cmd == "run_hardcode")
	{
		echo '<div class="section white">';
		$adaptive = new \AdaptivePayPal\Pay("Pay");
		$result = $adaptive
					->setActionType("PAY")
					->setIP("192.168.0.1")
					->setCurrencyCode()
					->setCancelUrl("http://localhost")
					->setReturnUrl("http://localhost/simple_paypal_php_sdk/adaptive_return.php")
					->setErrorLanguage()
					->setReceiverList(array(
						array("email" 	=> "pro_1318871541_biz@paypal.com", 
							"amount" 	=> "15.00",
							"primary" 	=> "true"
							), 
						array("email" 	=> "seller_1318871802_biz@paypal.com", 
							"amount" 	=> "10.00",
							"primary" 	=> "false"
						)
					))
					->execute();

		include("views/result.php");
		echo "</div>";
	}

	?>
<form action=
"https://www.sandbox.paypal.com/webapps/adaptivepayment/flow/pay"
target="PPDGFrame">
	<input id="type" type="hidden" name="expType" value="light">
	<input id="paykey" type="hidden" name="paykey" value="<?php echo $result['payKey']; ?>">
	<input type="submit" id="submitBtn" value="Pay with PayPal">
<script>
    var dg = new PAYPAL.apps.DGFlow({
        // the HTML ID of the form button
        trigger: 'submitBtn'
    });
</script>
</form>


</div>
<?php
include("views/footer.php");
//End of adaptive_payment_test.php