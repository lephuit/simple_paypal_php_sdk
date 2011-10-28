<?php
/**
 *
 * @package    JasonPayPalSDK
 * @version    1.0
 * @author     Jason Michels
 */

 
class PPDoDirectPayment extends PPPro{

	public $method = "DoDirectPayment";

	function __construct() 
	{
		parent::__construct();
	   	$this->request["METHOD"] = $this->method;
	   	$this->required = array("VERSION", "IPADDRESS", "CREDITCARDTYPE", "ACCT", "EXPDATE", "CVV2", "FIRSTNAME", "LASTNAME", "STREET", "CITY", "STATE", "ZIP", "COUNTRYCODE", "AMT",);
	}

// ---------- Required Parameters ----------------------------------------------------------------------- //

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

}

/* End of PPDoDirectPayment.php class */