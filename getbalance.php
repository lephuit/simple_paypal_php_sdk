<?php

class GetBalance extends Config{

	public $method = "GetBalance";
	public $curl = "";
	private $request = "";
	public $url = Config::WPP_NVP_ENDPOINT;

	function __construct() 
	{
	   $this->curl = new Curl();
	   $this->request = Config::wppNVPAuth();
	   $this->request["METHOD"] = $this->method;
	}

// ---------- Required Parameters ----------------------------------------------------------------------- //
	public function setVersion($version)
	{
		$this->request["VERSION"] = $version;
		return $this;
	}
// ---------- Optional Parameters ----------------------------------------------------------------------- //
	public function setCurrency($currency = 0) //If 0 returns primary currency, if 1 all currencies
	{
		$this->request["RETURNALLCURRENCIES"] = $currency;
		return $this;
	}

	//Once the $this->result array is formed this will make the curl call and return the response
	public function execute()
	{
		return Config::deformatNVP($this->curl->setUrl($this->url)->post($this->request));
	}
}

/* End of getbalance.php class */