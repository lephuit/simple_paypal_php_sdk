<?php 
$cmd = null;
if($_GET){ $cmd = $_GET['cmd']; }

//include("include.php");
include("views/header.php");
include("views/main/top_nav.php");
?>

<div class="container">

	<div class="section white">
		<script>
		$(function() {

		});
		</script>

		<h1>Welcome To PayPal API Testing.</h1>
		<h2>Choose an API to run below.  When you are finished click the title at top of the page to be returned here.</h2>
	</div>


	<?php 
	include("views/main/ddp_start.php");
	include("views/main/adaptive_create_invoice_start.php");
	include("views/main/adaptive_payment_start.php");
	include("views/main/pf_pro_start.php");
	include("views/main/set_ec_start.php");
	include("views/main/get_ec_start.php");
	include("views/main/do_ec_start.php");
	include("views/main/do_reference_start.php");
	include("views/main/create_recurring_profile_start.php");
	include("views/main/ba_update_start.php");
	?>



</div>
<?php
include("views/footer.php");
//End of index.php