
<div class = "col-lg-10 col-lg-offset-1 section" >

	<h4 class="cn-header">List of all the users</h4>
	<table class = "table table-striped">
		<thead>
			<tr>
				<th>User ID</th>
				<th>First name </th>
				<th>Last name</th>
				<th>contact</th>
				<th>email</th>
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
					echo "<td>" . $user['email'] . "</td>";
					echo "<td><button class='btn btn-info'> View </button>";
					echo "<button class='btn btn-danger'> Edit </button></td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>

</div>