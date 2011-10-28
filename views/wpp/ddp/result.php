<?php

if(is_array($result))
{
	if($result['ACK'] == "Success")
	{
		$result_alert = "Congratulations On A Successfull Transaction for -- $".$result['AMT']." ";
	}
	else
	{
		$result_alert = "Ouch! Something needs to be looked at.Transaction was a ".$result['ACK']."";
		if(isset($result['L_ERRORCODE0']))
		{
			if($result['L_ERRORCODE0'] == "10001")
			{ 
				$result_error = "Another random 10001 Internal Error, of course."; 
			}
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