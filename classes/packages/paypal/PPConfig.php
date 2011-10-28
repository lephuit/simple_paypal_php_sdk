<?php
/**
 *
 * @package    JasonPayPalSDK
 * @version    1.0
 * @author     Jason Michels
 * Naming convention: 
 * Classes will be Pascal Case. Example: class DoDirectPayment
 * Functions will be Camel Case: Example: function doQuery
 * Variables will use underscores: Example: this_good_variable
 * Constants same as variables except all upper case
 */

 //Here you will want to uncomment any API's you want to use
include("PPObject.php");
include("website_pro/PPPro.php");
include("website_pro/PPDoDirectPayment.php");



class PPConfig{
	protected $environment = "sandbox";

	protected $api_creds = array();
	protected $endpoints = array();

	function __construct() 
	{
		$this->api_creds['sandbox']['user'] 	= "pro_1317935184_biz_api1.me.com";
		$this->api_creds['sandbox']['pwd'] 			= "1317935235";
		$this->api_creds['sandbox']['signature'] 	= "A0YRrGtEJVcl0-2UnaTpgloAIjq2AE9U-nqr1XFKEDanV4oPmqaPjrQn";

		$this->endpoints['wpp_nvp']['sandbox'] 	= "https://api-3t.sandbox.paypal.com/nvp";
		$this->endpoints['wpp_nvp']['live'] 	= "https://api-3t.paypal.com/nvp";
	}
}

/* End of PPConfig.php class */