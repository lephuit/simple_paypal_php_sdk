<?php

if(is_array($result))
{
	$result_alert = "Congratulations, you were able to connect to the service.";

	if(isset($result['ACK']))
	{
		if($result['ACK'] == "Success")
		{
			$result_alert = "Congratulations On A Successfull Transaction!";
		}
		else
		{
			$result_alert = "Ouch! Something needs to be looked at.Transaction was a ".$result['ACK']."";
		}
	}
}
else
{
	//There was an internal error processing your request
	$result_alert = "Ouch! Something needs to be looked at.";
	$result_error = $result;
}
?>

<h1><?=$result_alert?></h1>
<h3><?php if(isset($result_error)){echo $result_error;} ?></h3>

<?php
if(is_array($result))
{
?>
	<h3>Here is the raw result array returned in the API call.</h3>
	<ul>
		<?php
		foreach($result as $key => $value)
		{
			echo "<li>".$key." ===> ".$value."</li>";
		}
		?>
	</ul>

<?php
}

// End of file