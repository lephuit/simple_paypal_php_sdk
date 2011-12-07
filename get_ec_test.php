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
		include("views/main/get_ec_start.php");
	}

	//These are for GetExpressCheckoutDetails API
	if($cmd == "run_hardcode")
	{
		echo '<div class="section white">';
		$getec = new \PayPal\GetExpressCheckoutDetails();
		$result = $getec
	                    ->setVersion("75.0")
	                    ->setToken("EC-76G29939D1088022K")
	                    ->execute();

		include("views/result.php");
		echo "</div>";
	}

	?>
</div>
<?php
include("views/footer.php");
//End of index.php