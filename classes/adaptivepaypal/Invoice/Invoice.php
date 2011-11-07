<?php
namespace AdaptivePayPal;
/**
 *
 * @package    JasonPayPalAdaptiveSDK
 * @version    1.0
 * @author     Jason Michels
 */

class Invoice extends Adaptive{

	function __construct() 
	{
		parent::__construct();
	}

// ---------- Required Parameters ----------------------------------------------------------------------- //
	public function setErrorLanguage($language = "en_US")
	{
		$this->request["requestEnvelope.errorLanguage"] = $language;
		return $this;
	}

	public function setInvoiceMerchantEmail($email)
	{
		$this->request["invoice.merchantEmail"] = $email;
		return $this;	
	}

	public function setInvoicePayerEmail($email)
	{
		$this->request["invoice.payerEmail"] = $email;
		return $this;	
	}

	public function setInvoiceCurrencyCode($currency)
	{
		$this->request["invoice.currencyCode"] = $currency;
		return $this;	
	}

	public function setInvoiceItemList($items)
	{
		$i = 0;
		foreach($items as $item)
		{
			$this->request["invoice.itemList(".$i.").name"] 		= $item['name'];
			$this->request["invoice.itemList(".$i.").description"] 	= $item['description'];
			$this->request["invoice.itemList(".$i.").quantity"] 	= $item['quantity'];
			$this->request["invoice.itemList(".$i.").unitPrice"] 	= $item['unitPrice'];
			$this->request["invoice.itemList(".$i.").taxName"] 		= $item['taxName'];
			$this->request["invoice.itemList(".$i.").taxRate"] 		= $item['taxRate'];
			$i++;
		}
		return $this;
	}

	public function setPaymentTerms($terms)
	{
		$this->request["invoice.paymentTerms"] = $terms;
		return $this;	
	}

// ---------- Optional Parameters ----------------------------------------------------------------------- //

}

/* End of Invoice.php class */