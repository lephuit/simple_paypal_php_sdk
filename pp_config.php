<?php
include("curl.php");
include("pp_do_direct_pay.php");
include("pp_get_balance.php");

class PP_config
{
	const USERNAME = "pro_1317935184_biz_api1.me.com";
	const PWD = "1317935235";
	const SIGNATURE = "A0YRrGtEJVcl0-2UnaTpgloAIjq2AE9U-nqr1XFKEDanV4oPmqaPjrQn";
	const WPP_NVP_ENDPOINT = "https://api-3t.sandbox.paypal.com/nvp";

	public static function wpp_nvp_auth()
	{
		$data = array("USER" => PP_config::USERNAME, "PWD" => PP_config::PWD, "SIGNATURE" => PP_config::SIGNATURE);
		return $data;
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

/* End of pp_config.php class */