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

// ---------- Required Parameters ----------------------------------------------------------------------- //
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

	public function set_creditcard($credit)
	{
		$this->request["CREDITCARDTYPE"] = $credit["creditcardtype"];
		$this->request["ACCT"] = $credit["acct"];
		$this->request["EXPDATE"] = $credit["expdate"];
		$this->request["CVV2"] = $credit["cvv2"];
		return $this;
	}

	public function set_name($name) //Payer information fields. Email is not required
	{
		$this->request["FIRSTNAME"] = $name["first"];
		$this->request["LASTNAME"] = $name["last"];
		if(isset($name["email"])){ $this->request["EMAIL"] = $name["email"]; }
		return $this;
	}

	public function set_address($address)
	{
		$this->request["STREET"] = $address["street"];
		if(isset($address["street2"])){ $this->request["STREET2"] = $address["street2"]; }
		$this->request["CITY"] = $address["city"];
		$this->request["STATE"] = $address["state"];
		$this->request["ZIP"] = $address["zip"];
		$this->request["COUNTRYCODE"] = $address["countrycode"];
		if(isset($address["shiptophonenum"])){ $this->request["SHIPTOPHONENUM"] = $address["shiptophonenum"]; }
		return $this;
	}

	public function set_amt($amt)
	{
		$this->request["AMT"] = $amt;
		return $this;
	}

// ---------- Optional Parameters ----------------------------------------------------------------------- //
	public function set_paymentaction($paymentaction = 'Sale')
	{
		$this->request["PAYMENTACTION"] = $paymentaction;
		return $this;
	}

	public function set_returnfmfdetails($fmfdetails)
	{
		$this->request["RETURNFMFDETAILS"] = $fmfdetails;
		return $this;
	}

	public function set_currencycode($currency)
	{
		$this->request["CURRENCYCODE"] = $currency;
		return $this;
	}

	public function set_taxamt($tax)
	{
		$this->request["TAXAMT"] = $tax;
		return $this;
	}

	public function set_desc($desc)
	{
		$this->request["DESC"] = $desc;
		return $this;
	}

	public function set_custom($custom)
	{
		$this->request["CUSTOM"] = $custom;
		return $this;
	}

	public function set_invnum($invnum)
	{
		$this->request["INVNUM"] = $invnum;
		return $this;
	}

	public function set_notifyurl($notifyurl)
	{
		$this->request["NOTIFYURL"] = $notifyurl;
		return $this;
	}


	//Once the $this->result array is formed this will make the curl call and return the response
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