<?php

	
	// DB operation class 

	class Mysql
	{

		protected $conn = false;
		protected $sql;


		public function __construct($config = array())
		{
			$host = isset($config['host']) ? $config['host'] : 'localhost';
			$user = isset($config['user']) ? $config['user'] : 'root';
			$password = isset($config['password']) ? $config['password'] : '';
			$dbname = isset($config['dbname']) ? $config['dbname'] : '';
			$port = isset($conf)['port'] ? $config['port'] : '3306';
			$charset = isset($config['charset'])? $config['charset'] : '3306';


			// connecting to the db

			$this->conn = mysql_connect("$host:port", $user, $password) or die('Database connection error');

			mysql_select_db($dbname) or die('Database selection error');

			$this->setChar($charset);
 		}

 		private function setChar($charest)
 		{

        	$sql = 'set names '.$charest;

        	$this->query($sql);

    	}

    	public function query($sql)
    	{
    		$this->sql = $sql;
    		
    		$str = $sql . "  [". date("Y-m-d H:i:s") ."]" . PHP_EOL;
        	file_put_contents("log.txt", $str,FILE_APPEND);

        	$result = mysql_query($this->sql, $this->conn);

        	if(!$result)
        	{
        		die($this->errno() . ":". $this->error(). "</br> Error sql statement is : ". $this->sql.'<br>');
        	}

        	return $result;

    	}

    	 public function getRow($sql)
    	 {

        	if ($result = $this->query($sql)) 
        	{

	            $row = mysql_fetch_assoc($result);

	            return $row;

        	} 
        	else
            	return false;
        }



    	public function getOne($sql)
    	{

	        $result = $this->query($sql);

	        $row = mysql_fetch_row($result);

	        if ($row) 
	        {

	            return $row[0];

	        } 
	        else 
	        {

	            return false;

	        }
    	}

    	public function getAll($sql)
    	{
    		$result = $this->query($sql);
    		$list = array();

    		while($row = mysql_fetch_assoc($result))
    		{
    			$list[] = $row; 
    		}

    		return $list;
    	}

    	public function getCol($sql)
    	{
    		$result = $this->query($sql);
    		$list = array();

    		while($row = mysql_fetch_assoc($result))
    		{
    			$list[] = $row[0];	
    		}

    		return $list;

    	}

    	public function getInsertId()
    	{
    		return mysql_insert_id($this->conn);
    	}

    	public function errno()
    	{
    		return mysql_errno($this->conn);
    	}

    	public function error()
    	{
    		return mysql_error($this->conn);
    	}

	}
?>