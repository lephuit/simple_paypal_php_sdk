<script>
$(function() {

	$( "#top_nav a" ).button();

	$('#top_nav_message').click(function() {
		window.location.href = "index.php";
	});
	 
});
</script>

<div class="white" id="top_nav">
	<h1 id="top_nav_message">Jason's PayPal Testing Code</h1>
	<div>
		<a href="dodirectpayment_test.php">DoDirectPayment</a>
	</div>

</div>