<?php
namespace AdaptivePayPal;
/**
 *
 * @package    JasonPayPalAdaptiveSDK
 * @version    1.0
 * @author     Jason Michels
 */

class CreateInvoice extends Invoice{

	public $method = "CreateInvoice";

	function __construct() 
	{
		parent::__construct();
		$this->url = $this->endpoints['base_url']['invoice'][$this->environment].$this->method;
	}

// ---------- Required Parameters ----------------------------------------------------------------------- //

// ---------- Optional Parameters ----------------------------------------------------------------------- //

}

/* End of CreateInvoice.php class */