<?php
class Database{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_password = "";
    private $db_name = "PP_log";
    private $con = "";

    function __construct()
    {
       $this->connect();
    }

    private function connect()
    {
        $this->con = mysql_connect($this->db_host,$this->db_user,$this->db_password);

        if (!$this->con)
        {
            die('Could not connect: ' . mysql_error());
        }
        return $this;
    }

    public function doQuery($sql)
    {
        mysql_select_db($this->db_name, $this->con);
        $result = mysql_query($sql,$this->con);
        return $result;
    }
    
    public function getAssocArray($result)
    {
        $array = array();
        $i = 0;
        while ($data = mysql_fetch_array($result, MYSQL_ASSOC)) 
        {
            $array[$i] = $data;
            $i++;
        }
        return $array;
    }
	
}


/* End of database.php class */