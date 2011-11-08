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
		$invoice = new \AdaptivePayPal\CreateInvoice();
		$result = $invoice
					->setIP("192.168.0.1")
					->setErrorLanguage()
					->setInvoiceMerchantEmail("merchant@email.com")
					->setInvoicePayerEmail("payer@email.com")
					->setInvoiceCurrencyCode("USD")
					->setInvoiceItemList(array(array(
												"name" => "Banana Leaf", 
												"description" => "Banana Leaf Description",
												"quantity" => "1",
												"unitPrice" => "1",
												"taxName" => "Tax1",
												"taxRate" => "10.25"
												)
											)
										)
					->setPaymentTerms("Net10")
					->execute();
		print_r($result);
		//include("views/result.php");
		echo "</div>";
	}

	?>
</div>
<?php
include("views/footer.php");
//End of index.php