<?php
	
	include 'models/Model.class.php';
	include 'helpers/Helpers.class.php';
	class user
	{


		public function listUsers()
		{
			//echo "Its from the user controller". "<br>";

			//echo "Listing all the users"."<br>";

			$obj = new Model('user');
			$list = $obj->pageRows(0,8);

			include("views/Listusers.php");

		}

		public function create()
		{
			//echo "Creating user" . "</br>";

			include("views/Usercreate.html");

			if(isset($_POST['fname']))
			{
				$details = array();

				$details['fname'] = $_POST['fname'];
				$details['lname'] = $_POST['lname'];
				$details['email'] = $_POST['email'];
				$details['dob'] = $_POST['dob'];
				$details['contact'] = $_POST['contact'];
				$details['address'] = $_POST['address'];

				unset($_POST);

				$obj = new Model('user');
				$status = $obj->insert($details);

				Helpers::Redirect("http://localhost/lumino/index.php");
 			}
		}


	}
?>