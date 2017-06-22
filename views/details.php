<div class="col-lg-10 col-lg-offset-1 section">
	<table class = "table table-striped">
		<thead>
			<tr>
				<th>User ID</th>
				<th>First name </th>
				<th>Last name</th>
				<th>contact</th>
				<th>email</th>
				<th>Address</th>
			</tr>
		</thead>
		<tbody>
			<?php
				
				echo "<tr>";
				echo "<td>" . $user['user_id'] . "</td>";
				echo "<td>" . $user['fname'] . "</td>";
				echo "<td>" . $user['lname'] . "</td>";
				echo "<td>" . $user['contact'] . "</td>";
				echo "<td>" . $user['email'] . "</td>";
				echo "<td>" . $user['address'] . "</td>";
				echo "</tr>";
			?>
		</tbody>
	</table>
</div>