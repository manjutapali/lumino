
<div class = "col-lg-10 col-lg-offset-1 section" >

	<h4 class="cn-header">List of all the users</h4>
	<table class = "table table-striped">
		<thead>
			<tr>
				<th>User ID</th>
				<th>First name </th>
				<th>Last name</th>
				<th>contact</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($list as $user) {
					echo "<tr>";
					echo "<td>" . $user['user_id'] . "</td>";
					echo "<td>" . $user['fname'] . "</td>";
					echo "<td>" . $user['lname'] . "</td>";
					echo "<td>" . $user['contact'] . "</td>";
					echo "<td><button class='btn btn-info'><a href='http://localhost/lumino/index.php/user/details/". $user['user_id'] ."' class='btn-a'> View </a></button>";
					echo "<button class='btn btn-danger'><a href='http://localhost/lumino/index.php/user/edit/". $user['user_id'] . "' class='btn-a'> Edit </a></button></td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>

</div>