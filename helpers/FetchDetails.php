<?php 
	
	include_once '../models/Model.class.php';
	include_once 'executor.php';

	 //phpinfo();

	/*$con = mysqli_connect("127.0.0.1","root","","filestorer");

	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

  	$sql = "SELECT * FROM ris WHERE status = 0 ORDER BY priority";
  	$update = "UPDATE ris SET status = 1 WHERE id = ";
  	$res = $con->query($sql);

  	if($res->num_rows > 0)
  	{
  		while($obj = $res->fetch_object())
  		{
  			print_r($obj);
  			$update .= $obj->id;

  			$con->query($update);


  			$ex = new Executor();
  			$ex->connect();
  			$data = $ex->exec($obj->instructions);

  			//echo $data;

  			if($data !== "")
  			{
  				
  				$q = "UPDATE ris SET status = 2, worklog = '$data' WHERE id = " . $obj->id;
  				//echo "Updating , " . $q;
  				echo $con->query($q);
  			}
  			else{
  				echo "Updating DB";
  				$q = "UPDATE ris SET status = 10 WHERE id = " . $obj->id;
  				echo $con->query($q);
  			}

  		}
  	}*/

  	while(true)
  	{

  		$obj = new FetchDetails();

  		$rows = $obj->FetchRows();

  		if($rows->num_rows > 0)
  		{

  			while($row = $rows->fetch_object())
  			{
  				$obj->update_status($row->id, 1);

  				$ex = new Executor();
  				$ex->connect();
  				$data = $ex->exec($row->instructions);
  				$obj->update_status($row->id, 2);
  				$obj->update_worklog($row->id, $data);
  			}

  		}
  		else
  		{
  			$obj->close();
  			sleep(60);
  		}

  	}


  	class FetchDetails
  	{

  		private $con;

  		public function __construct()
  		{
  			$this->con = mysqli_connect("127.0.0.1","root","","filestorer");

			if (mysqli_connect_errno())
		  	{
		  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  		die();
		  	}
  		}

  		public function close()
  		{
  			mysqli_close($this->con);
  		}

  		public function FetchRows()
  		{
  			$sql = "SELECT * FROM ris WHERE status = 0 ORDER BY priority";
  			$res = $this->con->query($sql);

  			return $res;
  		}

  		public function update_status($id, $status)
  		{
  			$update = "UPDATE ris SET status = $status WHERE id = $id";

  			return $this->con->query($update);
  		}

  		public function update_worklog($id, $data)
  		{
  			$update = "UPDATE ris SET worklog = '$data' where id = $id";

  			return $this->con->query($update);
  		}


  	}

 ?>