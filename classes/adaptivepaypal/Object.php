<?php
namespace AdaptivePayPal;
/**
 *
 * @package    JasonPayPalAdaptiveSDK
 * @version    1.0
 * @author     Jason Michels
 */
class Object extends Config{

	protected $url = "";
	protected $request = array();
	protected $curl = "";
	protected $required = array();
	protected $request_headers = array();

	function __construct() 
	{
		parent::__construct();
		$this->curl = new \Curl\Curl();
	}

	public function execute()
	{
		try{
			//$this->checkRequired($this->required, $this->request);
			
			return $this->curl
						->setUrl($this->url)
						->setHttpHeader($this->request_headers)
						->post($this->request);
			/*
			print_r($this->url);
			echo "<br />";
			print_r($this->request_headers);
			echo "<br />";
			print_r($this->request);
			*/
		}
		catch(Exception $e){
			return "Error Message: ".$e->getMessage();
		}
		
	}

	//This is used to check to make sure all required fields are being entered
	public function checkRequired($required, $request, $title = "API request")
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

	public function deformatNVP($nvpstr)
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

/* End of Object.php class */