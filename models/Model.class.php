<?php

    
    include 'Mysql.class.php';

	class Model
	{
		protected $db;
		protected $table;
		protected $fields = array();

		public function __construct($table)
		{
			$dbconfig['host'] = "localhost";
			$dbconfig['user'] = "root";
			$dbconfig['password'] = "";
			$dbconfig['dbname'] = "filestorer";
			$dbconfig['port'] = "3306";
			$dbconfig['charset'] = "utf8";

			$this->db = new Mysql($dbconfig);
			$this->table = $table;
			$this->getFields();
		}

		private function getFields()
		{
			$sql = "DESC " . $this->table;
			$result = $this->db->getAll($sql);

			foreach ($result as $val) 
			{
				$this->fields[] = $val['Field'];

				if($val['Key'] == 'PRI')
				{
					$pk = $val['Field'];
				}	
			}

            if (isset($pk)) 
            {

                $this->fields['pk'] = $pk;

            }
		}


        //Inserting into the table
        public function insert($list)
        {
        	$field_list = '';
        	$value_list = '';

        	foreach($list as $key => $value)
        	{
        		if(in_array($key, $this->fields))
        		{
        			$field_list .= '`' . $key . '`' . ',';
        			$value_list .= '"' . $value . '"' . ',';
        		}
        	}

        	$field_list = rtrim($field_list, ",");
        	$value_list = rtrim($value_list, ",");

        	$sql = "INSERT INTO `{$this->table}` ({$field_list}) VALUES({$value_list})";
            echo "SQL statement = ".$sql;
        	if($this->db->query($sql))
        	{
        		return $this->db->getInsertId();
        	}
        	else
        	{
        		return false;
        	}
        }

        //Updating records
        public function update($list, $uid)
        {
        	$update_fields = '';
        	$where = "`user_id`= $uid";

        	foreach ($list as $key => $value) 
            {
        		
        		$update_fields .= "`$key`='$value'" . ",";
        		
        	}

        	$update_fields = rtrim($update_fields,",");

        	$sql = "UPDATE `{$this->table}` SET {$update_fields} WHERE {$where}";

        	if($this->db->query($sql))
        	{
        		// returns how many rows are affected
        		if($rows = mysql_affected_rows())
        		{

        			return $rows;
        		}
        		else
        		{
        			return false;
        		}
        	}
        	else
        	{
        		return false;
        	}
        }


        public function selectByPk($pk)
        {
        	$sql = "SELECT * FROM `{$this->table}` WHERE `{$this->fields['pk']}` = $pk";

        	return $this->db->getRow($sql);
        }

        public function total()
        {
        	$sql = "SELECT COUNT(*) FROM {$this->table}";

        	return $this->db->getOne($sql);
        }

        public function pageRows($offset, $limit, $where="")
        {
        	if(empty($where))
        	{
        		$sql = "SELECT * FROM {$this->table} LIMIT $offset, $limit";
        	}
        	else
        	{
        		$sql = "SELECT * FROM {$this->table} WHERE $where LIMIT $offset, $limit";
        	}

        	$list =  $this->db->getAll($sql);

            return $list;
        }

	}
?>