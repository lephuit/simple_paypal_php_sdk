<?php
include("pp_auth.php");
include("curl.php");


class PP_get_balance extends PP_auth
{
	public $method = "GetBalance";
	public $curl = "";

	function __construct() 
	{
	   $this->curl = new curl();
	}

	public function get_balance($currency = 1)
	{
		$url = PP_auth::wpp_nvp_start();
		$url .= "&METHOD=".$this->method;
		$url .= "&RETURNALLCURRENCIES=".$currency;

		$data = $this->curl->set_url($url)->post();
		print_r($data);
	}
}

/* End of pp_getbalance.php class */