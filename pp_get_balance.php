<?php

class PP_get_balance extends PP_config
{
	public $method = "GetBalance";
	public $curl = "";
	private $request = "";
	public $url = PP_config::WPP_NVP_ENDPOINT;

	function __construct() 
	{
	   $this->curl = new curl();
	   $this->request = PP_config::wpp_nvp_auth();
	   $this->request["METHOD"] = $this->method;
	}

// ---------- Required Parameters ----------------------------------------------------------------------- //
	public function set_version($version)
	{
		$this->request["VERSION"] = $version;
		return $this;
	}
// ---------- Optional Parameters ----------------------------------------------------------------------- //
	public function set_currency($currency = 0) //If 0 returns primary currency, if 1 all currencies
	{
		$this->request["RETURNALLCURRENCIES"] = $currency;
		return $this;
	}

	//Once the $this->result array is formed this will make the curl call and return the response
	public function execute()
	{
		return PP_config::deformat_nvp($this->curl->set_url($this->url)->post($this->request));
	}
}

/* End of pp_get_balance.php class */