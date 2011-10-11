<?php

class DoDirectPayment extends Config{

	public $method = "DoDirectPayment";
	private $log = "";
	public $curl = "";
	public $url = Config::WPP_NVP_ENDPOINT;
	private $request = "";
	public $required = array("VERSION", "IPADDRESS", "CREDITCARDTYPE", "ACCT", "EXPDATE", "CVV2", "FIRSTNAME", "LASTNAME", "STREET", "CITY", "STATE", "ZIP", "COUNTRYCODE", "AMT",);

	function __construct() 
	{
	   $this->curl = new Curl();
	   $this->log = new Log();
	   $this->request = Config::wppNVPAuth();
	   $this->request["METHOD"] = $this->method;
	}

// ---------- Required Parameters ----------------------------------------------------------------------- //
	public function setVersion($version)
	{
		$this->request["VERSION"] = $version;
		return $this;
	}

	public function setIP($ip)
	{
		$this->request["IPADDRESS"] = $ip;
		return $this;
	}

	public function setCreditCard($credit)
	{
		$this->request["CREDITCARDTYPE"] = $credit["creditcardtype"];
		$this->request["ACCT"] = $credit["acct"];
		$this->request["EXPDATE"] = $credit["expdate"];
		$this->request["CVV2"] = $credit["cvv2"];
		return $this;
	}

	public function setName($name) //Payer information fields. Email is not required
	{
		$this->request["FIRSTNAME"] = $name["first"];
		$this->request["LASTNAME"] = $name["last"];
		if(isset($name["email"])){ $this->request["EMAIL"] = $name["email"]; }
		return $this;
	}

	public function setAddress($address)
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

	public function setAmt($amt)
	{
		$this->request["AMT"] = $amt;
		return $this;
	}

// ---------- Optional Parameters ----------------------------------------------------------------------- //
	public function setPaymentAction($paymentaction = 'Sale')
	{
		$this->request["PAYMENTACTION"] = $paymentaction;
		return $this;
	}

	public function setReturnFMFDetails($fmfdetails)
	{
		$this->request["RETURNFMFDETAILS"] = $fmfdetails;
		return $this;
	}

	public function setCurrencyCode($currency)
	{
		$this->request["CURRENCYCODE"] = $currency;
		return $this;
	}

	public function setTaxAmt($tax)
	{
		$this->request["TAXAMT"] = $tax;
		return $this;
	}

	public function setDesc($desc)
	{
		$this->request["DESC"] = $desc;
		return $this;
	}

	public function setCustom($custom)
	{
		$this->request["CUSTOM"] = $custom;
		return $this;
	}

	public function setInvNum($invnum)
	{
		$this->request["INVNUM"] = $invnum;
		return $this;
	}

	public function setNotifyURL($notifyurl)
	{
		$this->request["NOTIFYURL"] = $notifyurl;
		return $this;
	}


	//Once the $this->result array is formed this will make the curl call and return the response
	public function execute()
	{
		try{
			Config::checkRequired($this->required, $this->request, $this->method);

			$response = Config::deformatNVP($this->curl->setUrl($this->url)->post($this->request));
			//this will log the outgoing request and incoming response
			$this->log->dumpResponse(array("data" => $response));

			return $response;

		}catch(Exception $e){
			echo "Error Message: ".$e->getMessage();
		}
		
	}

	



}

/* End of dodirectpayment.php class */