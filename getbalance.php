<?php

class GetBalance extends Config{

	public $method = "GetBalance";
	public $curl = "";
	private $request = "";
	public $url = Config::WPP_NVP_ENDPOINT;

	function __construct() 
	{
	   $this->curl = new Curl();
	   $this->request = Config::wpp_nvp_auth();
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
		return Config::deformat_nvp($this->curl->set_url($this->url)->post($this->request));
	}
}

/* End of GetBalance.php class */