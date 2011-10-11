<?php
//API will return ACK code of (Success, SuccessWithWarning, or Failure)
//This will be a class to dump the api string and response into a database

class Log{

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
		$this->db->doQuery($sql);
	}

	public function dumpRequest($array)
	{
		$this->dump(Config::DUMP_REQUEST_TABLE, $array);
		return true;
	}

	public function dumpResponse($array)
	{
		$this->dump(Config::DUMP_RESPONSE_TABLE, $array);
		return true;
	}
	
}

/* End of log.php class */