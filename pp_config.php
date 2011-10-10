<?php
include("Curl.php");
include("PP_dodirectpayment.php");
//include("pp_getbalance.php");

class PP_config{
	
	const USERNAME = "pro_1317935184_biz_api1.me.com";
	const PWD = "1317935235";
	const SIGNATURE = "A0YRrGtEJVcl0-2UnaTpgloAIjq2AE9U-nqr1XFKEDanV4oPmqaPjrQn";
	const WPP_NVP_ENDPOINT = "https://api-3t.sandbox.paypal.com/nvp";

	public static function wpp_nvp_auth()
	{
		$data = array("USER" => PP_config::USERNAME, "PWD" => PP_config::PWD, "SIGNATURE" => PP_config::SIGNATURE);
		return $data;
	}

	//This is used to check to make sure all required fields are being entered
	public static function check_required($required, $request, $title = "API request")
	{
		foreach($required as $key)
		{
			if (array_key_exists($key, $request) == false) 
			{
			    throw new Exception($key."---- is a required field to process ".$title.".");
			}
		}
		return true;
	}

	public static function deformat_nvp($nvpstr)
	{

		$intial=0;
	 	$nvpArray = array();

		while(strlen($nvpstr)){
			//postion of Key
			$keypos= strpos($nvpstr,'=');
			//position of value
			$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

			/*getting the Key and Value values and storing in a Associative Array*/
			$keyval=substr($nvpstr,$intial,$keypos);
			$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
			//decoding the respose
			$nvpArray[urldecode($keyval)] =urldecode( $valval);
			$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
	     }
		return $nvpArray;
	}
}

/* End of PP_config.php class */