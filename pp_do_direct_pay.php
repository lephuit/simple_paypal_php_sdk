<?php

class PP_do_direct_pay extends PP_config
{
	public $method = "DoDirectPayment";
	public $curl = "";
	public $url = PP_config::WPP_NVP_ENDPOINT;
	private $request = "";
	public $required = array("VERSION", "IPADDRESS", "CREDITCARDTYPE", "ACCT", "EXPDATE", "CVV2", "FIRSTNAME", "LASTNAME", "STREET", "CITY", "STATE", "ZIP", "COUNTRYCODE", "AMT",);
	public $error_fields = null;

	function __construct() 
	{
	   $this->curl = new curl();
	   $this->request = PP_config::wpp_nvp_auth();
	   $this->request["METHOD"] = $this->method;
	}

	public function set_version($version)
	{
		$this->request["VERSION"] = $version;
		return $this;
	}

	public function set_ip($ip)
	{
		$this->request["IPADDRESS"] = $ip;
		return $this;
	}

	public function set_paymentaction($paymentaction = 'Sale')
	{
		$this->request["PAYMENTACTION"] = $paymentaction;
		return $this;
	}

	public function set_creditcard($credit)
	{
		$this->request["CREDITCARDTYPE"] = $credit["creditcardtype"];
		$this->request["ACCT"] = $credit["acct"];
		$this->request["EXPDATE"] = $credit["expdate"];
		$this->request["CVV2"] = $credit["cvv2"];
		return $this;
	}

	public function set_name($name)
	{
		$this->request["FIRSTNAME"] = $name["first"];
		$this->request["LASTNAME"] = $name["last"];
		return $this;
	}

	public function set_address($address)
	{
		$this->request["STREET"] = $address["street"];
		$this->request["CITY"] = $address["city"];
		$this->request["STATE"] = $address["state"];
		$this->request["ZIP"] = $address["zip"];
		$this->request["COUNTRYCODE"] = $address["countrycode"];
		return $this;
	}

	public function set_amt($amt)
	{
		$this->request["AMT"] = $amt;
		return $this;
	}

	public function execute()
	{
		$required = $this->check_required();

		if($required != false)
		{
			return PP_config::deformat_nvp($this->curl->set_url($this->url)->post($this->request));
		}
		else
		{
			return $this->error_fields;
		}
		
	}

	//This is used to check to make sure all required fields are being entered
	private function check_required()
	{
		foreach($this->required as $key)
		{
			if (array_key_exists($key, $this->request) == false) 
			{
			    $this->error_fields["fields"][] = $key;
			}
		}

		if($this->error_fields != null)
		{
			$this->error_fields["pre_pay_error"] = "You are missing some required fields. Please check your request.";
			return false;
		}
		return true;
	}



}

/* End of pp_do_direct_pay.php class */