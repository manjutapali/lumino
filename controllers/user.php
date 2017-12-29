<?php
	
	include_once 'models/Model.class.php';
	include 'helpers/Helpers.class.php';
	class user
	{


		public function listUsers()
		{

			$obj = new Model('user');
			$list = $obj->pageRows(0,8);

			include("views/Listusers.php");

		}

		public function create()
		{
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

				Helpers::Redirect("/");
 			}
		}

		public function details($uid)
		{
			
			$obj = new Model('user');
			$user = $obj->selectByPk($uid);

			include('views/details.php');

			exit;
		}

		public function edit($uid="")
		{
			if(empty($uid))
			{

			}
			else
			{
				//echo "User id = " . $uid . "<br>";
				$obj = new Model('user');
				$user = $obj->selectByPk($uid);

				include('views/edit.php');

				if(isset($_POST['fname']))
				{
					$details = array();

					$details['fname'] = $_POST['fname'];
					$details['lname'] = $_POST['lname'];
					$details['email'] = $_POST['email'];
					$details['dob'] = $_POST['dob'];
					$details['contact'] = $_POST['contact'];
					$details['address'] = $_POST['address'];
					//print_r($_POST);
					unset($_POST);

					$obj = new Model('user');
					$status = $obj->update($details, $uid);

					Helpers::Redirect("/");
	 			}

			}
		}

	}
?>