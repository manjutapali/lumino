
<div class = "col-lg-10 col-lg-offset-1 section" >

	<h4 class="cn-header">List of all the users</h4>
	<table class = "table table-striped">
		<thead>
			<tr>
				<th>User ID</th>
				<th>Name </th>
				<th>Email </th>
				<th>Date of birth</th>
				<th>Gender </th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($list as $user) {
					echo "<tr>";
					echo "<td>" . $user['user_id'] . "</td>";
					echo "<td>" . $user['name'] . "</td>";
					echo "<td>" . $user['email'] . "</td>";
					echo "<td>" . $user['dob'] . "</td>";
					echo "<td>" . $user['gender'] . "</td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>

</div>