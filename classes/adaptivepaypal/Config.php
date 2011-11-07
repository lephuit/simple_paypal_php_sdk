<?php
namespace AdaptivePayPal;
/**
 *
 * @package    JasonPayPalAdaptiveSDK
 * @version    1.0
 * @author     Jason Michels
 * Naming convention: 
 * Classes will be Pascal Case. Example: class DoDirectPayment
 * Functions will be Camel Case: Example: function doQuery
 * Variables will use underscores: Example: this_good_variable
 * Constants same as variables except all upper case
 */

 //Here you will want to uncomment any API's you want to use
include("Object.php");
include("Adaptive.php");
include("Invoice/Invoice.php");
include("Invoice/CreateInvoice.php");



class Config{
	protected $environment = "sandbox";

	protected $api_headers = array();
	protected $endpoints = array();

	function __construct() 
	{
		$this->api_headers['sandbox']['X-PAYPAL-SECURITY-USERID'] 		= "pro_1317935184_biz_api1.me.com";
		$this->api_headers['sandbox']['X-PAYPAL-SECURITY-PASSWORD']	= "1317935235";
		$this->api_headers['sandbox']['X-PAYPAL-SECURITY-SIGNATURE'] 		= "A0YRrGtEJVcl0-2UnaTpgloAIjq2AE9U-nqr1XFKEDanV4oPmqaPjrQn";
		$this->api_headers['sandbox']['X-PAYPAL-REQUEST-DATA-FORMAT'] 	= "NV";
		$this->api_headers['sandbox']['X-PAYPAL-RESPONSE-DATA-FORMAT'] 	= "NV";
		$this->api_headers['sandbox']['X-PAYPAL-APPLICATION-ID'] 			= "APP-80W284485P519543T";

		$this->endpoints['base_url']['invoice']['sandbox']	= "https://sandbox.svcs.paypal.com/Invoice/";
		$this->endpoints['base_url']['invoice']['live'] 	= "https://svcs.paypal.com/Invoice/";
	}
}

/* End of Config.php class */