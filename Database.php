<?php
class Database{
    private $db_host = "";
    private $db_user = "";
    private $db_password = "";
    private $db_name = "";
    private $con = "";

    function __construct()
    {
       include("connection/db_config.php");
       $this->db_host = $db_host;
       $this->db_user = $db_user;
       $this->db_password = $db_password;
       $this->db_name = $db_name;
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

    public function do_query($sql)
    {
        mysql_select_db($this->db_name, $this->con);
        $result = mysql_query($sql,$this->con);
        return $result;
    }
    
    public function get_assoc_array($result)
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



?>