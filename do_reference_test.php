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
		include("views/main/do_reference_start.php");
	}

	//These are for DoReferenceTransaction API
	if($cmd == "run_hardcode")
	{
		echo '<div class="section white">';
		$doreference = new \PayPal\DoReferenceTransaction();
		$result = $doreference
	                    ->setVersion()
	                    ->setReferenceId("B-6U1370943C441603J")
	                    ->setPaymentAction()
	                    ->setAmt("1000.00")
	                    ->setCurrencyCode()
	                    ->execute();

		include("views/result.php");
		echo "</div>";
	}

	?>
</div>
<?php
include("views/footer.php");
//End of index.php