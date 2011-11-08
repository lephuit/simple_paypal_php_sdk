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
		include("views/main/pf_pro_start.php");
	}

	//These are for Payflow Pro API
	if($cmd == "run_hardcode")
	{
		echo '<div class="section white">';
		$pfpro = new \Payflow\Pro();
		$result = $pfpro
	                    ->setTrxType("S")
	                    ->setTender("C")
	                    ->setAmt("10.00")
	                    ->setCreditCard(array(
	                            "acct" => "4111111111111111", 
	                            "expdate" => "1013", 
	                            "cvv2" => "123"
	                    ))
	                    ->setName(array(
	                            "first" => "Jason", 
	                            "last" => "Michels"
	                    ))
	                    ->setAddress(array(
	                            "street" => "123 Main", 
	                            "city" => "Papillion", 
	                            "state" => "NE", 
	                            "zip" => "68046"
	                    ))
	                    ->setComments(array("Test Comment1", "Test Comment2"))
	                    ->setVerbosity("MEDIUM")
	                    ->execute();

		include("views/result.php");
		echo "</div>";
	}

	?>
</div>
<?php
include("views/footer.php");
//End of index.php