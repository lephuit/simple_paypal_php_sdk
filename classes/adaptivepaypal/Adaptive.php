<?php
namespace AdaptivePayPal;
/**
 *
 * @package    JasonPayPalAdaptiveSDK
 * @version    1.0
 * @author     Jason Michels
 */

class Adaptive extends Object{

	function __construct() 
	{
		parent::__construct();
	}

	public function setIP($ip)
	{
		$this->api_headers[$this->environment]['X-PAYPAL-DEVICE-IPADDRESS'] = $ip;
		
		//build http headers array
		foreach($this->api_headers[$this->environment] as $key => $value)
		{
			$this->request_headers[] = $key.": ".$value;
		}
		return $this;
	}

}

/* End of Adaptive.php class */