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
		include("views/main/ba_update_start.php");
	}

	//These are for BillAgreementUpdate API
	if($cmd == "run_hardcode")
	{
		echo '<div class="section white">';
		$getec = new \PayPal\BillAgreementUpdate();
		$result = $getec
	                    ->setVersion()
	                    ->setReferenceId("B-2A343947K8102981J")
	                    ->setBillingAgreementStatus("Canceled")
	                    ->execute();

		include("views/result.php");
		echo "</div>";
	}

	?>
</div>
<?php
include("views/footer.php");
//End of index.php