<?php
include_once 'models/Model.class.php';

/**
* 
*/
class  ris
{

	public function create()
	{
		date_default_timezone_set('Asia/Kolkata');
	
		include("views/ris_create.html");

		$priority = array('Low' => 0, 'Medium' => 1, 'High' => 2);

		if(isset($_POST['title']))
		{
			$details = array();

			$details['title'] = $_POST['title'];
			$date  = $_POST['duedate'];
			$details['due_date'] = $date;
			$details['requestor'] = $_POST['requestor'];
			$details['task'] = $_POST['task'];
			$details['instructions'] = $_POST['instructions'];
			$details['priority'] = $priority[$_POST['priority']];

			unset($_POST);
			
			$obj = new Model('ris');
			$status = $obj->insert($details);

			Helpers::Redirect("/");
		}
	}

	public function listRIS()
	{
		$obj = new Model('ris');
		$list = $obj->pageRows(0,8);

		include('views/ListRIS.php');
	}
}

?>