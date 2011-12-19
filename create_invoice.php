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
		include("views/main/adaptive_create_invoice_start.php");
	}

	//These are for CreateInvoice API
	if($cmd == "run_hardcode")
	{
		echo '<div class="section white">';
		$invoice = new \AdaptivePayPal\Invoice("CreateAndSendInvoice");
		$result = $invoice
					->setIP("192.168.0.1")
					->setErrorLanguage("en_US")
					->setInvoiceMerchantEmail("pro_1318871541_biz@paypal.com")
					->setInvoicePayerEmail("buyer_1318871412_per@paypal.com")
					->setInvoiceCurrencyCode("USD")
					->setInvoiceItemList(array(array(
												"name" => "BBanana+Leaf+--+001", 
												"description" => "Banana+Leaf",
												"quantity" => "1",
												"unitPrice" => "1",
												"taxName" => "Tax1",
												"taxRate" => "10.25"
												)
											)
										)
					->setPaymentTerms("Net10")
					->execute();
		include("views/result.php");
		echo "</div>";
	}

	?>
</div>
<?php
include("views/footer.php");
//End of index.php