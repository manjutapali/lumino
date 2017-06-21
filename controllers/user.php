<?php
	
	include 'models/Model.class.php';

	class user
	{


		public function listUsers()
		{
			//echo "Its from the user controller". "<br>";

			//echo "Listing all the users"."<br>";

			$obj = new Model('userInfo');
			$list = $obj->pageRows(0,8);

			include("views/Listusers.php");

		}
	}
?>