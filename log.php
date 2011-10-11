<?php
//API will return ACK code of (Success, SuccessWithWarning, or Failure)
//This will be a class to dump the api string and response into a database

class Log extends Config{

	private $curl = "";
	private $db = "";

	function __construct() 
	{
	   $this->curl = new Curl();
	   $this->db = new Database();

	}

	public function dump($db_table, $array)
	{
		//serialize array and dump to database
		$sql = "INSERT INTO ".$db_table." VALUES ('', '".serialize($array)."', FROM_UNIXTIME('".time()."'))";
		$this->db->do_query($sql);
	}

	public function dump_request($array)
	{
		$this->dump(Config::DUMP_REQUEST_TABLE, $array);
		return true;
	}

	public function dump_response($array)
	{
		$this->dump(Config::DUMP_RESPONSE_TABLE, $array);
		return true;
	}
	
}

/* End of log.php class */