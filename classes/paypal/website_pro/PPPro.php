<?php
/**
 *
 * @package    JasonPayPalSDK
 * @version    1.0
 * @author     Jason Michels
 */


class PPPro extends PPObject{

	function __construct() 
	{
		parent::__construct();
		$this->request = $this->wppNVPAuth();
		$this->url = $this->endpoints['wpp_nvp'][$this->environment];
	}

	public function setVersion($version = "80.0")
	{
		$this->request["VERSION"] = $version;
		return $this;
	}

	public function wppNVPAuth()
	{
		return array(
			"USER" 		=> $this->api_creds[$this->environment]['user'], 
			"PWD" 		=> $this->api_creds[$this->environment]['pwd'], 
			"SIGNATURE" => $this->api_creds[$this->environment]['signature']
		);
	}
}

/* End of PPPro.php class */