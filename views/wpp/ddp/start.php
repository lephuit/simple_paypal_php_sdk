<div class="section white">

<script>
$(function() {

	$('#basic_dodirectpayment_form').hide();
	$( "#ddp_submit_button" ).button();
	$('#ddp_loader_image').hide();

	//This is to show the form
	$('#basic_dodirectpayment_button').click(function() {
		$('#basic_dodirectpayment_form').toggle('slow');
		return false;
	});

	$('#ddp_submit_button').click(function(){
		$('#ddp_submit_button').hide();
		$('#ddp_loader_image').show();
	});

});
</script>



<h1>DoDirectPayment</h1>

<div>
	<ul>
		<li>
			<h3>
				<a href="dodirectpayment_test.php?cmd=ddp_run_hardcode" id="code_dodirectpayment_button">Process DoDirectPayment API Via HardCode</a>			
			</h3>
		</li>
		<li>
			<h3>
				<a href="#" id="basic_dodirectpayment_button">Process DoDirectPayment API Via Form</a>
			</h3>
		</li>
		
	</ul>
</div>

<div id="basic_dodirectpayment_form">

    <form action="dodirectpayment_test.php?cmd=ddp_run_form" method="post" accept-charset="utf-8">
    
    <fieldset>
    	<legend class="bold">Payment Information</legend>
	    <div class="register_form_item">
	        <div class="register_form_labels">Amount</div>
	        <input type="text" name="amt" value="2.00" size="60" />
	    </div>

	    <div class="register_form_item">
	        <div class="register_form_labels">Paymentaction</div>
	        <select name="paymentaction">
				<option value="Sale">Sale</option>
				<option value="Authorization">Authorization</option>
			</select>
	    </div>
    </fieldset>

    <fieldset>
    	<legend class="bold">Credit Card Information</legend>
	    <div class="register_form_item">
	        <div class="register_form_labels">Credit Card Type</div>
	        <select name="creditcardtype">
				<option value="Visa">Visa</option>
				<option value="MasterCard">MasterCard</option>
				<option value="Discover">Discover</option>
				<option value="Amex">Amex</option>
				<option value="Maestro">Maestro</option>
			</select>

	    </div>

	    <div class="register_form_item">
	        <div class="register_form_labels">Card Number</div>
	        <input type="text" name="acct" value="4322713247967434" size="60" />
	    </div>

	    <div class="register_form_item">
	        <div class="register_form_labels">Expiration Date (MMYYYY)</div>
	        <input type="text" name="expdate" value="052013" size="60" />
	    </div>

	    <div class="register_form_item">
	        <div class="register_form_labels">CSC</div>
	        <input type="text" name="cvv2" value="123" size="60" />
	    </div>
    </fieldset>

    
    <fieldset>
    	<legend class="bold">Name</legend>
	    <div class="register_form_item">
	        <div class="register_form_labels">First Name</div>
	        <input type="text" name="first" value="Jason" size="60" />
	    </div>

	    <div class="register_form_item">
	        <div class="register_form_labels">Last Name</div>
	        <input type="text" name="last" value="Michels" size="60" />
	    </div>
    </fieldset>

    
    <fieldset>
    	<legend class="bold">Address Information</legend>
	    <div class="register_form_item">
	        <div class="register_form_labels">Street</div>
	        <input type="text" name="street" value="123 Main St" size="60" />
	    </div>

	    <div class="register_form_item">
	        <div class="register_form_labels">City</div>
	        <input type="text" name="city" value="Papillion" size="60" />
	    </div>

	    <div class="register_form_item">
	        <div class="register_form_labels">State</div>
	        <input type="text" name="state" value="NE" size="60" />
	    </div>

	    <div class="register_form_item">
	        <div class="register_form_labels">Zip Code</div>
	        <input type="text" name="zip" value="68046" size="60" />
	    </div>

	    <div class="register_form_item">
	        <div class="register_form_labels">Country Code</div>
	        <input type="text" name="countrycode" value="US" size="60" />
	    </div>
    </fieldset>

    <div class="center"><input id="ddp_submit_button" type="submit" value="Submit" /></div>
    <div class="center" id="ddp_loader_image"><h2>LOADING...</h2></div>

    </form>

</div>

</div>